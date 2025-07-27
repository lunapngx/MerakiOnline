<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\Shield\Models\UserModel;

class UserGroups extends BaseCommand
{
    protected $group = 'Auth';
    protected $name = 'auth:usergroups';
    protected $description = 'Displays the groups a user belongs to.';

    public function run(array $params)
    {
        // Get the user's email or ID from the command line
        $identifier = $params[0] ?? CLI::prompt('Enter the user\'s email or ID');

        $userModel = new UserModel();
        $user = null;

        // Find the user by ID or email
        if (is_numeric($identifier)) {
            $user = $userModel->findById($identifier);
        } else {
            $user = $userModel->findByCredentials(['email' => $identifier]);
        }

        if (! $user) {
            CLI::error('User not found.');
            return;
        }

        $groups = $user->getGroups();

        if (empty($groups)) {
            CLI::write('User ' . $user->username . ' does not belong to any groups.', 'yellow');
        } else {
            CLI::write('User ' . $user->username . ' belongs to the following groups:', 'green');
            foreach ($groups as $group) {
                CLI::write('- ' . $group);
            }
        }
    }
}