<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Dashboard extends BaseController
{
    public function index()
    {
        // Instantiate the model to fetch data for the dashboard
        $productModel = new ProductModel();

        // Count the total number of products
        $productCount = $productModel->countAllResults();

        // Pass the data to the view
        $data = [
            'title' => 'Dashboard',
            'product_count' => $productCount,
        ];

        // Render the dashboard view with the data
        return view('admin/dashboard', $data);
    }
}