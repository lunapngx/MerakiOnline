<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    // The table this model is associated with
    protected $table = 'orders';

    // The primary key of the table
    protected $primaryKey = 'id';

    // Specify the fields that can be mass-assigned
    protected $allowedFields = [
        'user_id',
        'total_amount',
        'status',
        'created_at',
        'updated_at',
    ];

    // Use timestamps to automatically fill created_at and updated_at
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    // Define a function to get all orders with user details.
    // This is useful for your admin dashboard.
    public function getOrdersWithUsernames()
    {
        return $this->db->table('orders')
            ->select('orders.*, users.username')
            ->join('users', 'users.id = orders.user_id')
            ->orderBy('orders.created_at', 'DESC')
            ->get()
            ->getResultArray();
    }

    // A function to update the status of a specific order
    public function updateOrderStatus(int $orderId, string $newStatus)
    {
        return $this->update($orderId, ['status' => $newStatus]);
    }

    // You can also add functions to get order items for a specific order
    public function getOrderItems(int $orderId)
    {
        $orderItemsModel = new \App\Models\OrderItemsModel(); // Assuming you create a new model for this
        return $orderItemsModel->where('order_id', $orderId)->findAll();
    }
    public function getOrderDetails($orderId)
    {
        $order = $this->find($orderId);
        if (!$order) {
            return null;
        }

        $orderItemsModel = new \App\Models\OrderItemsModel();
        $order['items'] = $orderItemsModel->where('order_id', $orderId)->findAll();

        return $order;
    }

    // Method to update the status of an order
    public function updateStatus($orderId, $newStatus)
    {
        return $this->update($orderId, ['status' => $newStatus]);
    }
}