<?php namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table      = 'categories'; // Assuming your categories table is named 'categories'
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'object'; // or 'array'
    protected $useSoftDeletes = false;
    protected $allowedFields = ['name']; // Assuming a 'name' column for categories
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}