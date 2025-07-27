<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\Config\Services;

class AuthGroupsFilter implements FilterInterface
{
    // Called before the controller method
    public function before(RequestInterface $request, $arguments = null)
    {
        // Get the user data (assuming you're using sessions to store logged-in user data)
        $user = session()->get('user'); // Adjust based on how you retrieve the user data

        // Check if the user is logged in
        if (!$user) {
            return redirect()->to('/login'); // Redirect to login if not logged in
        }

        // Get the user's groups (roles), assuming they are stored in the user session
        $userGroups = $user['groups'] ?? []; // Adjust according to how you're storing groups

        // Check if the user has one of the required groups (superadmin or customer)
        if (!empty($arguments) && !array_intersect($arguments, $userGroups)) {
            // If the user does not have any of the required groups, deny access
            return redirect()->to('/no-access'); // Redirect to a "no access" page
        }

        // Optionally, you can add more checks or logging logic here
    }

    // Called after the controller method
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Optionally, you can perform actions after the request has been processed
        // For example, logging or adding additional headers
    }
}
