<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController; // Ensure this is present
use CodeIgniter\HTTP\ResponseInterface; // Import ResponseInterface

class LegalController extends BaseController
{
    /**
     * Loads the combined user agreements page (Contact Us, Privacy Policy, Terms & Conditions).
     */
    public function userAgreements(): ResponseInterface
    {
        // Define the title for the page
        $data['title'] = 'Legal Information - Meraki Giftshop';

        // Render the useragreements.php file first, then pass it as the 'content' section to the master layout
        return $this->response->setBody(
            view('layouts/master', [
                'title' => $data['title'],
                'content' => view('content/useragreements', $data)
            ])
        );
    }
}