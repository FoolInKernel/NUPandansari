<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Panggil RoleSeeder di sini agar tereksekusi
        $this->call([
            RoleSeeder::class,
        ]);
    }
}