<?php // app/Database/Migrations/YYYY-MM-DD-HHMMSS_AddSlugToCategories.php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class AddSlugToCategories extends Migration
{
    public function up()
    {
        $this->forge->addColumn('categories', [
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'unique'     => true,
                'after'      => 'name', // Position after 'name' column
            ],
        ]);
    }
    public function down()
    {
        $this->forge->dropColumn('categories', 'slug');
    }
}