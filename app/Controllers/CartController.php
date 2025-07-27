<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniterCart\Cart; // Corrected namespace to match the CodeIgniterCart library

class CartController extends Controller
{
    protected Cart $cart;
    protected ProductModel $productModel;

    public function __construct()
    {
        $this->cart = \Config\Services::cart();
        $this->productModel = new ProductModel();
        helper(['url', 'session']);
    }

    public function index()
    {
        $data = [
            'cartItems' => $this->cart->contents(),
            'total' => $this->cart->total(),
        ];
        return view('content/cart', $data);
    }

    public function add()
    {
        $productId = $this->request->getPost('product_id');
        $product = $this->productModel->find($productId);
        $quantity = (int)$this->request->getPost('quantity') ?: 1;

        if ($product) {
            $this->cart->insert([
                'id'      => $productId,
                'qty'     => $quantity,
                'price'   => $product['price'],
                'name'    => $product['name'],
                'options' => [],
                'image'   => $product['image'],
            ]);

            return redirect()->back()->with('success', 'Product added to cart!');
        } else {
            return redirect()->back()->with('error', 'Product not found!');
        }
    }

    public function updateQuantity()
    {
        $rowid = $this->request->getPost('rowid');
        $newQuantity = (int)$this->request->getPost('quantity');

        $item = $this->cart->getItem($rowid);
        $maxStock = $this->productModel->find($item['id'])['stock'] ?? 99;

        if ($newQuantity > $maxStock) {
            $newQuantity = $maxStock;
            session()->setFlashdata('info', 'Quantity adjusted to maximum available stock.');
        } elseif ($newQuantity < 1) {
            $newQuantity = 1;
            session()->setFlashdata('info', 'Quantity cannot be less than 1. Adjusted to 1.');
        }

        $this->cart->update([
            'rowid' => $rowid,
            'qty'   => $newQuantity,
        ]);

        session()->setFlashdata('success', 'Cart updated successfully!');
        return redirect()->to(url_to('cart_view'));
    }

    public function removeItem()
    {
        $rowid = $this->request->getPost('rowid');
        $this->cart->remove($rowid);

        session()->setFlashdata('success', 'Product removed from cart.');
        return redirect()->to(url_to('cart_view'));
    }

    public function clearCart()
    {
        $this->cart->destroy();

        session()->setFlashdata('success', 'Your cart has been cleared!');
        return redirect()->to(url_to('cart_view'));
    }
}