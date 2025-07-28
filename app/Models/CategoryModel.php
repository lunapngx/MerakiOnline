<?php namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'product_categories'; // Ensure this matches your actual table name
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    // These fields must match the columns in your 'product_categories' database table
    protected $allowedFields = [
        'name',
        'slug',
        'description',
        // Add other category-related fields here if you have them
    ];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;
}