<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            [
                'id' => 4,
                'title' => 'Milad Un Nabi',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in',
                'date' => '2045-01-01',
                'time' => '06:55:00',
                'image' => 'assets/uploads/1717228241.jpg',
                'created_at' => '2024-06-01 02:50:41',
                'updated_at' => '2024-06-07 08:15:59',
            ],
            [
                'id' => 5,
                'title' => 'Eid Ul Fitr',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in',
                'date' => '2025-01-01',
                'time' => '11:30:00',
                'image' => 'assets/uploads/1717228706.jpg',
                'created_at' => '2024-06-01 02:58:26',
                'updated_at' => '2024-06-01 02:58:26',
            ],
            [
                'id' => 6,
                'title' => 'Eud Ul Azha',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in',
                'date' => '2045-01-01',
                'time' => '23:30:00',
                'image' => 'assets/uploads/1717228841.jpg',
                'created_at' => '2024-06-01 03:00:41',
                'updated_at' => '2024-06-01 03:00:41',
            ],
        ]);
    }
}
