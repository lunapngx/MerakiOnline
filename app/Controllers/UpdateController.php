<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\SystemStatusModel;
use CodeIgniter\API\ResponseTrait;

class UpdateController extends BaseController
{
    use ResponseTrait;
    protected $productModel;
    protected $systemStatusModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->systemStatusModel = new SystemStatusModel();
    }

    public function checkProducts()
    {
        // Get the last known timestamp from the client's AJAX request
        $clientLastUpdate = $this->request->getVar('last_update');

        // Set a timeout of 30 seconds for the long poll
        $timeout = 30;
        $startTime = time();

        while (time() - $startTime < $timeout) {
            $status = $this->systemStatusModel->find(1);

            if ($status && strtotime($status['last_product_update']) > $clientLastUpdate) {
                // A new product has been added, fetch the latest products
                $latestProducts = $this->productModel->orderBy('id', 'desc')->findAll(10);

                return $this->respond([
                    'status' => 'success',
                    'products' => $latestProducts,
                    'last_update' => strtotime($status['last_product_update']),
                ]);
            }

            // If no update, sleep for a short period before checking again
            sleep(1);
        }

        // If the timeout is reached without any updates, respond with no changes
        return $this->respond([
            'status' => 'no_update',
        ]);
    }
}