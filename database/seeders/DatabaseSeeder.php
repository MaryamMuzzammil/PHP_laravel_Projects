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
        // User::factory(10)->create();

        $this->call([
            DonationSeeder::class,
           
                RolesSeeder::class,
             
                PermissionRolesSeeder::class,
                UsersSeeder::class,
                BlogsSeeder::class,
                EventsSeeder::class,
                TestimonialsSeeder::class,
                PermissionsSeeder::class,
        
        ]);
    }
}
