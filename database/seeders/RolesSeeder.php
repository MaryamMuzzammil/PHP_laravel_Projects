<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'created_at' => '2024-06-12 11:12:49',
                'updated_at' => NULL,
            ],
            [
                'id' => 4,
                'name' => 'user',
                'created_at' => NULL,
                'updated_at' => NULL,
            ],
        ]);
    }
    }

