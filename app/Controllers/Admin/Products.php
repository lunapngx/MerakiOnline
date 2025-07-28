<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use CodeIgniter\Files\File;
use CodeIgniter\HTTP\RedirectResponse;
use App\Models\SystemStatusModel;

class Products extends BaseController
{
    protected ProductModel $productModel;
    protected SystemStatusModel $systemStatusModel; // Add this line

    public function __construct()
    {
        $this->productModel = new ProductModel();
        $this->systemStatusModel = new SystemStatusModel(); // Add this line
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

    // ... (rest of the controller code)

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

        $data = $this->request->getPost();

        if ($file->isValid() && ! $file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads', $newName);
            $data['image'] = 'uploads/' . $newName;
        } else {
            return redirect()->back()->withInput()->with('error', 'Image upload failed.');
        }

        if ($this->productModel->insert($data)) {
            // Add this crucial line to update the timestamp
            $this->systemStatusModel->update(1, ['last_product_update' => date('Y-m-d H:i:s')]);

            return redirect()->to(url_to('products-index'))->with('success', 'Product created successfully.');
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
            return redirect()->to(url_to('products-index'))->with('error', 'Product not found.');
        }

        $data = ['product' => $product];

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
            return redirect()->to(url_to('products-index'))->with('error', 'Product not found.');
        }

        // Validation rules for update (image is optional)
        $rules = [
            'name'        => 'required|max_length[255]',
            'description' => 'required',
            'price'       => 'required|numeric',
            'stock'       => 'required|integer',
        ];

        $file = $this->request->getFile('image');
        if ($file->isValid() && ! $file->hasMoved()) {
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

        $data = $this->request->getPost();

        if ($file->isValid() && ! $file->hasMoved()) {
            // Delete old image if it exists
            $oldImage = $product['image'] ?? null;
            if ($oldImage !== null && file_exists(FCPATH . $oldImage)) {
                unlink(FCPATH . $oldImage);
            }

            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads', $newName);
            $data['image'] = 'uploads/' . $newName;
        }

        if ($this->productModel->update($id, $data)) {
            return redirect()->to(url_to('products-index'))->with('success', 'Product updated successfully.');
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
        $product = $this->productModel->find($id);

        if ($product === null) {
            return redirect()->to(url_to('products-index'))->with('error', 'Product not found.');
        }

        // Delete the associated image file
        $oldImage = $product['image'] ?? null;
        if ($oldImage !== null && file_exists(FCPATH . $oldImage)) {
            unlink(FCPATH . $oldImage);
        }

        if ($this->productModel->delete($id)) {
            return redirect()->to(url_to('products-index'))->with('success', 'Product deleted successfully.');
        }

        return redirect()->to(url_to('products-index'))->with('error', 'Failed to delete product.');
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
            return redirect()->to(url_to('products-index'))->with('error', 'Product not found.');
        }

        $data = ['product' => $product];

        return view('admin/products/show', $data);
    }
}