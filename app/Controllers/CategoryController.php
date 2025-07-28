<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use CodeIgniter\Exceptions\PageNotFoundException; // Make sure this is imported

class CategoryController extends BaseController
{
    protected $categoryModel;
    protected $productModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
        $this->productModel = new ProductModel();
    }

    // ... (your existing index method)

    public function show($identifier)
    {
        // Attempt to find category by ID first
        $category = $this->categoryModel->find($identifier);

        // If not found by ID, try finding by name/slug (assuming 'slug' column exists and is unique)
        if (empty($category)) {
            $category = $this->categoryModel->where('slug', $identifier)->first();
        }

        // If category is still empty, throw 404
        if (empty($category)) {
            throw PageNotFoundException::forPageNotFound();
        }

        // Fetch products belonging to this category
        $productsInCategories = $this->productModel->where('category_id', $category->id)->findAll();

        $data = [
            'title'    => $category->name . ' Products',
            'category' => $category,
            'products' => $productsInCategories,
        ];

        return view('content/category_detail', $data);
    }
}