<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class SalesReport extends BaseController
{
    public function index()
    {
        return view('admin/sales_report');
    }
}
