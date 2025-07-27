<?php

namespace App\Controllers;

use CodeIgniter\Shield\Models\UserModel;// Add this line to use the User Model

class AccountController extends BaseController
{
    public function index()
    {
        // Get the current logged-in user's ID
        $userId = auth()->user()->id;

        // Get the user's full data from the database
        $userModel = new UserModel();
        $user = $userModel->find($userId);

        // Pass the user data to the view
        $data = [
            'user' => $user,
        ];

        return view('home', $data);
    }
}