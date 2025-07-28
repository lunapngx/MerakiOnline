<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Orders extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Orders Management', // You can set any appropriate title here
        ];
        return view('admin/orders', $data);
    }
}