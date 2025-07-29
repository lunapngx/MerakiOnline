<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class SalesReport extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    public function index()
    {
        $products = $this->productModel->findAll();

        $totalSales = 0;
        $totalOrders = 0;
        if (!empty($products)) {
            foreach ($products as $product) {
                $totalSales += $product->sales ?? 0;
            }
        }

        $report = [
            'total_sales' => $totalSales,
            'total_orders' => $totalOrders
        ];

        return view('admin/sales_report', [
            'products' => $products,
            'report' => $report
        ]);
    }
}