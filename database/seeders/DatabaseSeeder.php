<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Menghapus semua data user yang ada agar tidak duplikat
        User::query()->delete();

        // Membuat akun Admin Default
        User::create([
            'name' => 'Admin Transtech',
            'email' => 'admin@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('rahasia123'),
            'role' => 'admin',
        ]);
    }
}
