<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\Config\Services;

class AuthGroupsFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Get the authenticated user
        $user = auth()->user();

        // Check if the user is logged in
        if (!$user) {
            return redirect()->to('/login');
        }

        // Get the user's groups from the Shield library
        $userGroups = $user->getGroups();

        // Check if the user has any of the required groups
        if (!empty($arguments) && !array_intersect($arguments, $userGroups)) {
            // If the user does not have any of the required groups, deny access
            return redirect()->to('/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action needed after the controller method
    }
}