<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PustakawanSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Pustakawan',
            'email' => 'pustakawan@kampus.ac.id',
            'password' => Hash::make('123456')
        ]);
    }
}