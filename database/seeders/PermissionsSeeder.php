<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            [
                'id' => 1,
                'name' => 'Dashboard',
                'slug' => 'Dashboard',
                'groupby' => '0',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'User',
                'slug' => 'User',
                'groupby' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'name' => 'Add User',
                'slug' => 'Add User',
                'groupby' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'name' => 'Edit User',
                'slug' => 'Edit User',
                'groupby' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'name' => 'Delete User',
                'slug' => 'Delete User',
                'groupby' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 6,
                'name' => 'Role',
                'slug' => 'Role',
                'groupby' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'name' => 'Add Role',
                'slug' => 'Add Role',
                'groupby' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'name' => 'Edit Role',
                'slug' => 'Edit Role',
                'groupby' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'name' => 'Delete Role',
                'slug' => 'Delete Role',
                'groupby' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 10,
                'name' => 'Blog',
                'slug' => 'Blog',
                'groupby' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 11,
                'name' => 'Add Blog',
                'slug' => 'Add Blog',
                'groupby' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 12,
                'name' => 'Edit Blog',
                'slug' => 'Edit Blog',
                'groupby' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'name' => 'Delete Blog',
                'slug' => 'Delete Blog',
                'groupby' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'name' => 'Testimonial',
                'slug' => 'Testimonial',
                'groupby' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 15,
                'name' => 'Add Testimonial',
                'slug' => 'Add Testimonial',
                'groupby' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 16,
                'name' => 'Edit Testimonial',
                'slug' => 'Edit Testimonial',
                'groupby' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 17,
                'name' => 'Delete Testimonial',
                'slug' => 'Delete Testimonial',
                'groupby' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 18,
                'name' => 'Event',
                'slug' => 'Event',
                'groupby' => '5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 19,
                'name' => 'Add Event',
                'slug' => 'Add Event',
                'groupby' => '5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 20,
                'name' => 'Edit Event',
                'slug' => 'Edit Event',
                'groupby' => '5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 21,
                'name' => 'Delete Event',
                'slug' => 'Delete Event',
                'groupby' => '5',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 22,
                'name' => 'Forms for Donations',
                'slug' => 'Forms for Donations',
                'groupby' => '6',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 23,
                'name' => 'Donation',
                'slug' => 'Donation',
                'groupby' => '7',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 24,
                'name' => 'Settings',
                'slug' => 'Settings',
                'groupby' => '8',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 25,
                'name' => 'Add Donation',
                'slug' => 'Add Donation',
                'groupby' => '7',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 26,
                'name' => 'Edit Donation',
                'slug' => 'Edit Donation',
                'groupby' => '7',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 27,
                'name' => 'Delete Donation',
                'slug' => 'Delete Donation',
                'groupby' => '7',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
    }
