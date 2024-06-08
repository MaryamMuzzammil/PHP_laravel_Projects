<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$cPhwPQWdYOyx7iUVMDDHvuS2.pytV3udNdCvJHb6yd7WEz7JWorFS',
                'role_id' => 1,
                'remember_token' => NULL,
                'created_at' => '2024-06-06 13:38:38',
                'updated_at' => '2024-06-06 13:38:38',
            ],
            [
                'id' => 3,
                'name' => 'user',
                'email' => 'user@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$NbeY.Ah15XZc2yyc0KEdB.FF/qicKZddEjSzRWvtp.NS/MUVDyLgC',
                'role_id' => 4,
                'remember_token' => NULL,
                'created_at' => '2024-06-06 13:42:28',
                'updated_at' => '2024-06-06 13:42:28',
            ],
        ]);
    
    }
}
