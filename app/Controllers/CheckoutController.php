<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class CheckoutController extends Controller
{
    public function index()
    {
        // Load the 'form' helper (as previously done)
        helper('form');
        // Load the 'number' helper
        helper('number');

        $items = []; // Initialize as empty array
        $session = session();
        if ($session->has('cart_items')) {
            $items = $session->get('cart_items');
        }

        // Dummy data for demonstration. Replace with your actual calculations.
        $subtotal = 1234.56;
        $shipping = 100.00;
        $tax = 50.75;
        $total = $subtotal + $shipping + $tax;

        $data = [
            'items'    => $items,
            'subtotal' => $subtotal,
            'shipping' => $shipping,
            'tax'      => $tax,
            'total'    => $total,
            'pageTitle' => 'Checkout',
        ];

        // The view path has been corrected to 'content/checkout' to match a common project structure.
        return view('content/checkout', $data);
    }
}