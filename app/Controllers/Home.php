<?php

namespace App\Controllers;

use App\Models\ProductModel; // Import your ProductModel

class Home extends BaseController
{
    public function index(): string
    {
        // 1. Instantiate the Product Model
        $productModel = new ProductModel();

        // 2. Fetch some products from the database
        //    (e.g., the 8 most recent products)
        $latestProducts = $productModel->orderBy('created_at', 'DESC')->findAll(8);

        // 3. Pass the product data to the view
        $data = [
            'products' => $latestProducts,
            'title'    => 'Welcome to Meraki Online Shopping!',
        ];

        // 4. Load the new 'home' view instead of 'welcome_message'
        return view('home', $data);
    }
}