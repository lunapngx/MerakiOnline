<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class AdminAccount extends BaseController
{
    public function index()
    {
        return view('admin/adminaccount');
    }
}
