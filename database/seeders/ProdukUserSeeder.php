<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProdukUserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Produk',
            'email' => 'adminproduk@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin_produk'
        ]);

        User::create([
            'name' => 'Customer Produk',
            'email' => 'customer@gmail.com',
            'password' => Hash::make('customer123'),
            'role' => 'customer_produk'
        ]);
    }
}