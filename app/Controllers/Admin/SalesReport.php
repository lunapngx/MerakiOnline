<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class SalesReport extends BaseController
{
    public function index()
    {
        $products = [
            ['id' => 1, 'name' => 'Lamb Plushie Package', 'price' => 499, 'stock' => 10, 'sales' => 5000],
            ['id' => 2, 'name' => 'Ribbon Satin Bouquet', 'price' => 200, 'stock' => 14, 'sales' => 5000],
            ['id' => 3, 'name' => 'Bucket Hat', 'price' => 250, 'stock' => 8, 'sales' => 5000],
            ['id' => 4, 'name' => 'Crochet Headband', 'price' => 100, 'stock' => 20, 'sales' => 5000],
            ['id' => 5, 'name' => 'Crochet Pouches', 'price' => 120, 'stock' => 21, 'sales' => 5000],
            ['id' => 6, 'name' => 'Butterfly Bouquet', 'price' => 300, 'stock' => 16, 'sales' => 5000],
            ['id' => 7, 'name' => 'Crochet Keychain', 'price' => 180, 'stock' => 36, 'sales' => 5000],
        ];

        $report = [
            'total_sales' => 35000,
            'total_orders' => 7
        ];

        return view('admin/sales_report', [
            'products' => $products,
            'report' => $report
        ]);

    }
}
