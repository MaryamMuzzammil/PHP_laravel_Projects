<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User; 
class TestimonialsSeeder extends Seeder
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
            $this->command->info('No users found. Testimonials seeding aborted.');
            return;
        }

        // Testimonial data array
        $testimonialsData = [
            [
                'name' => 'Full Name 1',
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'profession' => 'Profession 1',
                'image' => 'assets/uploads/1717400929.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Full Name 2',
                'content' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'profession' => 'Profession 2',
                'image' => 'assets/uploads/1717401090.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Full Name 2',
                'content' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'profession' => 'Profession 2',
                'image' => 'assets/uploads/1717401090.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Full Name 2',
                'content' => 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
                'profession' => 'Profession 2',
                'image' => 'assets/uploads/1717401090.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more testimonials here
        ];

        // Testimonials array to be inserted
        $testimonials = [];

        // Assign random user ID to each testimonial
        foreach ($testimonialsData as $testimonialData) {
            $testimonialData['user_id'] = $userIds[array_rand($userIds)];
            $testimonials[] = $testimonialData;
        }

        // Insert testimonials into the database
        DB::table('testimonials')->insert($testimonials);
    }
}
