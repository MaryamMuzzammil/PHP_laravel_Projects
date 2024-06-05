<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('donations')->insert([
            [
                'name' => 'Ali Umair',
                'email' => 'Ali@example.com',
                'amount' => 50,
                'payment_method' => 'credit_card',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ahmed Mansoor',
                'email' => 'Ahmed@example.com',
                'amount' => 100,
                'payment_method' => 'paypal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hamza Sohail',
                'email' => 'Hamza@example.com',
                'amount' => 50,
                'payment_method' => 'credit_card',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Zeeshan Farooqi ',
                'email' => 'Zeeshan@example.com',
                'amount' => 100,
                'payment_method' => 'paypal',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
