<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User; 
class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Get all existing user IDs
        $userIds = User::pluck('id')->toArray();

        // Check if there are any users available
        if (empty($userIds)) {
            $this->command->info('No users found. Blogs seeding aborted.');
            return;
        }

        // Blog data array
        $blogsData = [
            [
                'title' => 'Importance of “Piller” of Islam',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, aliquip ex ea commodo consequat.',
                'date' => '2024-01-01',
                'image' => 'assets/uploads/1717239135.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Importance of “Piller” of Islam',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, aliquip ex ea commodo consequat.',
                'date' => '2024-01-01',
                'image' => 'assets/uploads/1717239608.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'How to get closer to Allah',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in',
                'date' => '2023-02-01',
                'image' => 'assets/uploads/1717239754.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more blog entries here
        ];

        // Blogs array to be inserted
        $blogs = [];

        // Assign random user ID to each blog entry
        foreach ($blogsData as $blogData) {
            $blogData['user_id'] = $userIds[array_rand($userIds)];
            $blogs[] = $blogData;
        }

        // Insert blogs into the database
        DB::table('blogs')->insert($blogs);
    }
}