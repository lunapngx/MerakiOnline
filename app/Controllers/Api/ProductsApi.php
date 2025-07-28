<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use App\Models\SystemStatusModel;

class ProductsApi extends BaseController
{
    protected ProductModel $productModel;
    protected SystemStatusModel $systemStatusModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->systemStatusModel = new SystemStatusModel();
    }

    /**
     * Checks for new products based on a timestamp and returns them as JSON.
     */
    public function checkProducts()
    {
        $lastUpdateTimestamp = $this->request->getGet('last_update');

        // Fetch the last product update timestamp from SystemStatusModel
        $systemStatus = $this->systemStatusModel->find(1); // Assuming ID 1 for system status
        $dbLastProductUpdate = $systemStatus->last_product_update ?? '0000-00-00 00:00:00';

        // Convert timestamps to Unix for comparison
        $clientLastUpdate = strtotime($lastUpdateTimestamp);
        $serverLastUpdate = strtotime($dbLastProductUpdate);

        if ($serverLastUpdate > $clientLastUpdate) {
            // New products have been added or updated since the client's last check
            // Fetch products that were created or updated after the client's last timestamp
            $newProducts = $this->productModel
                ->where('created_at >', $lastUpdateTimestamp)
                ->orWhere('updated_at >', $lastUpdateTimestamp)
                ->findAll();

            return $this->response->setJSON([
                'status'      => 'success',
                'last_update' => $dbLastProductUpdate,
                'products'    => $newProducts,
            ]);
        } else {
            // No new updates
            return $this->response->setJSON([
                'status' => 'no_update',
            ]);
        }
    }
}