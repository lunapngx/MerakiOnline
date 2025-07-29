<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use CodeIgniter\Files\File;
use CodeIgniter\HTTP\RedirectResponse;
use App\Models\SystemStatusModel;
use App\Models\CategoryModel;

class Products extends BaseController
{
    protected ProductModel $productModel;
    protected SystemStatusModel $systemStatusModel;
    protected CategoryModel $categoryModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->systemStatusModel = new SystemStatusModel();
        $this->categoryModel = new CategoryModel();
    }

    /**
     * Displays a list of all products.
     */
    public function index(): string
    {
        $data = [
            'products' => $this->productModel->findAll(),
            'title'    => 'Products Management',
        ];

        return view('admin/products/index', $data);
    }

    /**
     * Displays the form to create a new product.
     * Add this method if it doesn't exist, or modify it.
     */
    public function new(): string
    {
        helper('form'); // Add this line to load the form helper

        $data = [
            'title'      => 'Add New Product',
            'categories' => $this->categoryModel->findAll(),
            'validation' => service('validation'),
        ];

        return view('admin/products/add_product', $data);
    }

    /**
     * Handles the form submission for creating a new product.
     *
     * @return RedirectResponse
     */
    public function create(): RedirectResponse
    {
        $rules = [
            'name'        => 'required|max_length[255]',
            'description' => 'required',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'category_id' => 'required|integer',
            'image'       => [
                'rules'  => 'uploaded[image]|max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Please select a valid image file.',
                    'max_size' => 'The image file is too large.',
                    'is_image' => 'The file must be an image.',
                    'mime_in'  => 'The image must be a JPG, JPEG, or PNG.',
                ],
            ],
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $file = $this->request->getFile('image');

        $data = [
            'name'          => $this->request->getPost('name'),
            'description'   => $this->request->getPost('description'),
            'price'         => $this->request->getPost('price'),
            'stock'         => $this->request->getPost('stock'),
            'category_id'   => $this->request->getPost('category_id'),
            'is_active'     => 1, // default, optional
        ];

        if ($file->isValid() && ! $file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads', $newName);
            $data['image'] = 'uploads/' . $newName;
        } else {
            return redirect()->back()->withInput()->with('error', 'Image upload failed.');
        }

        if ($this->productModel->insert($data)) {
            $this->systemStatusModel->update(1, ['last_product_update' => date('Y-m-d H:i:s')]);
            return redirect()->to(url_to('admin-products'))->with('success', 'Product created successfully.');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to create product.');
    }



    /**
     * Displays the form to edit a product.
     *
     * @param int|string|null $id
     */
    public function edit($id = null): string|RedirectResponse
    {
        $product = $this->productModel->find($id);

        if ($product === null) {
            return redirect()->to(url_to('admin-products'))->with('error', 'Product not found.');
        }

        $data = [
            'product'    => $product,
            'categories' => $this->categoryModel->findAll(), // Fetch all categories
            'validation' => service('validation'), // Pass validation service for displaying errors
        ];

        return view('admin/products/edit', $data);
    }

    /**
     * Handles the form submission for updating a product.
     *
     * @param int|string|null $id
     */
    public function update($id = null): RedirectResponse
    {
        $product = $this->productModel->find($id);
        if ($product === null) {
            return redirect()->to(url_to('admin-products'))->with('error', 'Product not found.');
        }

        // Validation rules for update (image is optional)
        $rules = [
            'name'        => 'required|max_length[255]',
            'description' => 'required',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
            'category_id' => 'required|integer',
        ];

        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $rules['image'] = [
                'rules'  => 'uploaded[image]|max_size[image,1024]|is_image[image]|mime_in[image,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Please select a valid image file.',
                    'max_size' => 'The image file is too large.',
                    'is_image' => 'The file must be an image.',
                    'mime_in'  => 'The image must be a JPG, JPEG, or PNG.',
                ],
            ];
        }

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'stock'       => $this->request->getPost('stock'),
            'category_id' => $this->request->getPost('category_id'),
        ];

        // Handle image replacement
        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $oldImage = $product->image ?? null;

            if ($oldImage !== null && file_exists(FCPATH . $oldImage)) {
                unlink(FCPATH . $oldImage);
            }

            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads', $newName);
            $data['image'] = 'uploads/' . $newName;
        }

        if ($this->productModel->update($id, $data)) {
            return redirect()->to(url_to('admin-products'))->with('success', 'Product updated successfully.');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to update product.');
    }

    /**
     * Deletes a product.
     *
     * @param int|string|null $id
     */
    public function delete($id = null): RedirectResponse
    {
        if ($id === null || !is_numeric($id)) {
            return redirect()->to(url_to('admin-products'))->with('error', 'Invalid product ID.');
        }

        $product = $this->productModel->find($id);

        if (!$product) {
            return redirect()->to(url_to('admin-products'))->with('error', 'Product not found.');
        }

        // Delete the image file if it exists
        $imagePath = FCPATH . $product->image;
        if (!empty($product->image) && file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Delete the product record
        if ($this->productModel->delete($id)) {
            return redirect()->to(url_to('admin-products'))->with('success', 'Product deleted successfully.');
        }

        return redirect()->to(url_to('admin-products'))->with('error', 'Failed to delete product.');
    }


    /**
     * Displays a single product's details.
     *
     * @param int|string|null $id
     */
    public function show($id = null): string|RedirectResponse
    {
        $product = $this->productModel->find($id);

        if ($product === null) {
            return redirect()->to(url_to('admin-products'))->with('error', 'Product not found.');
        }

        $data = ['product' => $product];

        return view('admin/products/show', $data);
    }
}