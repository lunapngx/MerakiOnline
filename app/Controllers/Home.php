<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('home');
    }

    public function makeAdmin()
    {
        // Get the email from the query string
        $email = $this->request->getGet('MerakiAdmin@gmail.com');

        // Your logic to find the user by email and assign them the admin role
        // ...
    }
}