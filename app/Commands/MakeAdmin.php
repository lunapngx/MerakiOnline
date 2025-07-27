<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\Shield\Models\UserModel;

class MakeAdmin extends BaseCommand
{
    protected $group = 'Auth';
    protected $name = 'auth:makeadmin';
    protected $description = 'Adds a user to the admin group.';

    public function run(array $params)
    {
        // Get the user's email or ID from the command line
        $identifier = $params[0] ?? CLI::prompt('Enter the user\'s email or ID');

        $userModel = new UserModel();
        $user = null;

        // Find the user by ID or email using the correct methods
        if (is_numeric($identifier)) {
            $user = $userModel->findById($identifier);
        } else {
            // Correctly find the user by email using findByCredentials
            $user = $userModel->findByCredentials(['email' => $identifier]);
        }

        if (! $user) {
            CLI::error('User not found.');
            return;
        }

        // Add the user to the admin group
        $user->addGroup('admin');

        CLI::write('User ' . $user->username . ' is now an admin.', 'green');
    }
}