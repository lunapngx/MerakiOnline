<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController; // Ensure this is present

class LegalController extends BaseController
{
    /**
     * Loads the combined user agreements page (Contact Us, Privacy Policy, Terms & Conditions).
     */
    public function userAgreements(): string
    {
        // Define the data to pass to the view
        $data['title'] = 'Legal Information - Meraki Giftshop';
        $data['heading'] = 'Our Legal Agreements'; // Example of another piece of data

        // Return the view. CodeIgniter will automatically handle
        // integrating it with the layout if 'content/useragreements' extends a layout.
        return view('content/useragreements', $data);
    }
}