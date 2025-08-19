<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $this->db->table('users')->insert([
            'email'         => 'admin@example.com',
            'username'      => 'admin',
            'password_hash' => password_hash('secret123', PASSWORD_DEFAULT),
            'created_at'    => date('Y-m-d H:i:s'),
        ]);
    }
}
