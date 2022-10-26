<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Penguna::create([
            'name' => 'Admin',
            'alamat' => 'Jl. Admin',
            'email' => 'admin@localhost.test',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
    }
}
