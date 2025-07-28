<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\SystemStatusModel;
use CodeIgniter\API\ResponseTrait; // Use this trait for easier JSON responses

class UpdateController extends BaseController
{
    use ResponseTrait; // Enable convenient JSON responses

    protected ProductModel $productModel;
    protected SystemStatusModel $systemStatusModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->systemStatusModel = new SystemStatusModel();
    }

    /**
     * Checks for new products based on a timestamp and returns them as JSON.
     * This method is polled by the frontend to dynamically update product lists.
     */
    public function checkProducts()
    {
        // Get the last update timestamp from the frontend request
        $lastUpdateTimestamp = $this->request->getGet('last_update');

        // Fetch the last product update timestamp recorded in the system status table
        // We assume there's a single record in 'system_status' with ID 1 for this purpose.
        $systemStatus = $this->systemStatusModel->find(1);
        $dbLastProductUpdate = $systemStatus->last_product_update ?? '0000-00-00 00:00:00'; // Default if not set

        // Convert timestamps to Unix for accurate comparison
        $clientLastUpdate = strtotime($lastUpdateTimestamp);
        $serverLastUpdate = strtotime($dbLastProductUpdate);

        // Check if there's any update on the server side since the client's last check
        if ($serverLastUpdate > $clientLastUpdate) {
            // New products have been added or updated.
            // Fetch products that were created OR updated since the client's last timestamp.
            $newProducts = $this->productModel
                ->where('created_at >', $lastUpdateTimestamp)
                ->orWhere('updated_at >', $lastUpdateTimestamp)
                ->findAll();

            // Return success status with the latest server timestamp and new products
            return $this->respond([
                'status'      => 'success',
                'last_update' => $dbLastProductUpdate,
                'products'    => $newProducts,
            ]);
        } else {
            // No new updates detected
            return $this->respond([
                'status' => 'no_update',
            ]);
        }
    }
}