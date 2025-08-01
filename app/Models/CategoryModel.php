<?php namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{

    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;


    protected $allowedFields    = ['name', 'description', 'slug'];


    protected $useTimestamps    = false;
}
