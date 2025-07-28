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
    public function process()
    {
        // 1. Validate the form data from the user
        // (You already have a form helper and validation setup in your views)

        if ($this->validate([
            'first_name' => 'required',
            // ... and so on for all required fields
        ])) {
            // 2. Save the order data to a new 'orders' table in your database
            // You'll need to create an OrderModel similar to your ProductModel
            $orderModel = new \App\Models\OrderModel();

            $orderData = [
                'user_id' => auth()->user()->id, // Assuming a logged-in user
                'status'  => 'Pending', // Initial status
                'total_amount' => $this->request->getPost('total'), // Get total from the form
                // ... capture other form fields like name, address, payment method
            ];
            $orderId = $orderModel->insert($orderData);

            if ($orderId) {
                // 3. Insert order items into a related 'order_items' table
                // Retrieve cart items and save them with the new orderId

                // ...

                // 4. Send a real-time notification to the admin dashboard
                // This is where the new code would go
                // trigger_admin_notification('new_order', ['order_id' => $orderId, 'customer' => $orderData['first_name']]);

                // 5. Redirect the customer to an order confirmation page
                return redirect()->to(site_url('order/confirmation/' . $orderId))->with('success', 'Your order has been placed successfully!');
            }
        }

        // Handle validation errors or failed save
        return redirect()->back()->withInput()->with('error', 'There was an error placing your order.');
    }
}