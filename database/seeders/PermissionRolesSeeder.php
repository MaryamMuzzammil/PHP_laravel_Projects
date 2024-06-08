<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     
        DB::table('permission_roles')->insert([
            ['id' => 245, 'permission_id' => 1, 'role_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 246, 'permission_id' => 10, 'role_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 247, 'permission_id' => 11, 'role_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 248, 'permission_id' => 12, 'role_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 249, 'permission_id' => 13, 'role_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 250, 'permission_id' => 14, 'role_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 251, 'permission_id' => 15, 'role_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 252, 'permission_id' => 16, 'role_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 253, 'permission_id' => 17, 'role_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 254, 'permission_id' => 22, 'role_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 255, 'permission_id' => 23, 'role_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 256, 'permission_id' => 24, 'role_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 257, 'permission_id' => 1, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 258, 'permission_id' => 2, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 259, 'permission_id' => 3, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 260, 'permission_id' => 4, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 261, 'permission_id' => 5, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 262, 'permission_id' => 6, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 263, 'permission_id' => 7, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 264, 'permission_id' => 8, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 265, 'permission_id' => 9, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 266, 'permission_id' => 10, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 267, 'permission_id' => 11, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 268, 'permission_id' => 12, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 269, 'permission_id' => 13, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 270, 'permission_id' => 14, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 271, 'permission_id' => 15, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 272, 'permission_id' => 16, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 273, 'permission_id' => 17, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 274, 'permission_id' => 18, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 275, 'permission_id' => 19, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 276, 'permission_id' => 20, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 277, 'permission_id' => 21, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 278, 'permission_id' => 23, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 279, 'permission_id' => 25, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 280, 'permission_id' => 26, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 281, 'permission_id' => 27, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 282, 'permission_id' => 24, 'role_id' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
