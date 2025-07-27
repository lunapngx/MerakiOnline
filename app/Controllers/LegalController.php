<?php

namespace App\Controllers;

use CodeIgniter\Controller; // Import Controller if not already imported by BaseController

class LegalController extends BaseController // Extend BaseController if you have one, otherwise extend Controller
{
    /**
     * Loads the combined user agreements page (Contact Us, Privacy Policy, Terms & Conditions).
     * This method will render the HTML content you previously generated.
     */
    public function userAgreements(): string
    {
        // This will load the HTML content from app/Views/home/useragreements.php
        return view('home/useragreements');
    }
}
