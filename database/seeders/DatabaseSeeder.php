<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {User::updateOrCreate(
            ['email' => 'pustakawan@kampus.ac.id'],
            [
                'name' => 'Angel Tobing',
                'email' => 'pustakawan@kampus.ac.id',
                'password' => Hash::make('123456'),
                'role' => 'pustakawan'
        ]);

        User::create([
            'name' => 'Anggota Perpustakaan',
            'email' => 'anggota@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'anggota'
        ]);
    }
}