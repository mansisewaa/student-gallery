<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class,
            RoleSeeder::class,
        ]);

        // $user = User::create([
        //     'name' => 'Mansi Admin',
        //     'email' => 'admin@example.com',
        //     'password' => bcrypt('password'),
        // ]);

        // $user->assignRole('admin');
        $this->call([
            // InstituteSeeder::class,
            // CategorySeeder::class,
            ProductSeeder::class,
        ]);
    }
}
