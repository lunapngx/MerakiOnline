<?php namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object'; // Use 'array' if you want associative arrays
    protected $useSoftDeletes   = false;

    // Make sure all columns here match your actual `products` table
    protected $allowedFields = [
        'name',
        'description',
        'price',
        'original_price',
        'stock',
        'category_id',
        'image',
        'colors',
        'sizes',
        'sku',
        'weight',
        'dimensions',
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'name'           => 'required|max_length[255]',
        'description'    => 'required',
        'price'          => 'required|numeric',
        'original_price' => 'permit_empty|numeric',
        'stock'          => 'required|integer',
        'category_id'    => 'required|integer',
        'image'          => 'permit_empty|max_length[255]',
        'colors'         => 'permit_empty|string',
        'sizes'          => 'permit_empty|string',
    ];

    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}
