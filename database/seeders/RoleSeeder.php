<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $superAdmin = Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);

        $user = User::create([
            'name' => 'Ketua Ranting',
            'email' => 'admin@nudesa.id',
            'password' => Hash::make('admin123'), // Password default
        ]);

        $user->assignRole($superAdmin);
    }
}