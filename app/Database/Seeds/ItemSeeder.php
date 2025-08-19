<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('items')->insertBatch([
            [
                'category'   => 'Electronics',
                'stock'      => 50,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'category'   => 'Books',
                'stock'      => 120,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
