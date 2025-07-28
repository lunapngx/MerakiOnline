<?php namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table      = 'products';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'object'; // Or 'array' for associative arrays
    protected $useSoftDeletes = false; // Your controller doesn't use soft deletes for products

    // --- CRITICAL: MATCH THESE TO YOUR DB COLUMNS ---
    protected $allowedFields = [
        'name',
        'description',
        'price',
        'stock',      // Matches DB column 'stock'
        'image',      // Matches DB column 'image'
        'category_id' // Matches DB column 'category_id'
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'name'        => 'required|max_length[255]',
        'description' => 'required', // Matches controller validation
        'price'       => 'required|numeric',
        'stock'       => 'required|integer',
        'image'       => 'permit_empty|max_length[255]', // Image validation is handled more robustly in controller
        'category_id' => 'required|integer', // Matches controller validation
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}