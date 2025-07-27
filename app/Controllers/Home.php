<?php

namespace App\Controllers;

use CodeIgniter\Shield\Models\UserModel; // Import the UserModel

class Home extends BaseController
{
    public function index()
    {
        // Load the custom helper here
        helper('auth');
        return view('home');
    }

    // TEMPORARY: Method to assign a user to the 'admin' group for testing
    // Now accepts an email address as the identifier
    public function makeAdmin($identifier = null)
    {
        // Basic validation for email format
        if (! filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
            echo "Please provide a valid email address as a segment (e.g., /makeAdmin/test@example.com).";
            return;
        }

        $users = new UserModel();
        // Find the user by their email address
        $user = $users->where('email', $identifier)->first();

        if ($user === null) {
            echo "User with email '{$identifier}' not found.";
            return;
        }

        // Add the user to the 'admin' group
        // This will create an entry in the 'auth_groups_users' table
        $user->addGroup('admin');

        echo "User with email '{$identifier}' has been assigned to the 'admin' group. You can now try logging in as this user and accessing the /admin page.";
    }
}

