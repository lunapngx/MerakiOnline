<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        // Add this line to load the 'auth' helper
        helper('auth');

        return view('home');
    }
}