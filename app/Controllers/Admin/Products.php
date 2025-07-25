<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class Products extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }

    // Displays a list of all products
    public function index()
    {
        $data = [
            'products' => $this->productModel->findAll(),
            'title'    => 'Products Management'
        ];
        return view('admin/products/index', $data);
    }

    // Displays the form to create a new product
    public function new()
    {
        return view('admin/products/new');
    }

    // Handles the form submission for creating a new product
    public function create()
    {
        if (!$this->validate($this->productModel->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();

        // Handle image upload
        $file = $this->request->getFile('image');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $newName);
            $data['image'] = $newName;
        }

        $this->productModel->insert($data);
        return redirect()->to('admin/products')->with('success', 'Product created successfully.');
    }

    // Displays the form to edit a product
    public function edit($id = null)
    {
        $data = [
            'product' => $this->productModel->find($id)
        ];
        return view('admin/products/edit', $data);
    }

    // Handles the form submission for updating a product
    public function update($id = null)
    {
        if (!$this->validate($this->productModel->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();

        // Handle image upload for updates
        $file = $this->request->getFile('image');
        if ($file->isValid() && !$file->hasMoved()) {
            // Delete old image if it exists
            $oldImage = $this->productModel->find($id)['image'];
            if ($oldImage && file_exists(WRITEPATH . 'uploads/' . $oldImage)) {
                unlink(WRITEPATH . 'uploads/' . $oldImage);
            }
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $newName);
            $data['image'] = $newName;
        } else {
            // Unset the image from data to prevent it from being saved as null
            unset($data['image']);
        }

        $this->productModel->update($id, $data);
        return redirect()->to('admin/products')->with('success', 'Product updated successfully.');
    }

    // Deletes a product
    public function delete($id = null)
    {
        $this->productModel->delete($id);
        return redirect()->to('admin/products')->with('success', 'Product deleted successfully.');
    }
}