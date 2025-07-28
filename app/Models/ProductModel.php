<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    // Add the new fields to $allowedFields
    protected $allowedFields = ['name', 'description', 'price', 'stock', 'image', 'original_price', 'category_id', 'colors', 'sizes']; // MODIFIED LINE
    protected $returnType    = 'array';

    /**
     * Get the validation rules for product creation and updates.
     */
    public function getValidationRules(array $options = []): array
    {
        return [
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
            // You might want to add validation rules for the new fields here as well
            'original_price' => 'permit_empty|numeric', // 'permit_empty' if optional
            'category_id'    => 'required|integer',     // category_id should be an integer and required
            'colors'         => 'permit_empty',         // Can be string or JSON, validate as needed
            'sizes'          => 'permit_empty',         // Can be string or JSON, validate as needed
        ];
    }
}