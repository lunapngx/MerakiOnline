<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'price', 'stock', 'image'];
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
        ];
    }
}