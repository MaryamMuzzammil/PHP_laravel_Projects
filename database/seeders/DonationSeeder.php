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
                'amount' => 112,
                'created_at' => now(),
                'email' => 'ali.hassan@example.com',
                'name' => 'Ali Hassan',
                'payment_method' => 'credit_card',
                'updated_at' => now(),
            ],
            [
                'amount' => 160,
                'created_at' => now(),
                'email' => 'fatima1.zahra@example.com',
                'name' => 'Fatima Zahra',
                'payment_method' => 'credit_card',
                'updated_at' => now(),
            ],
            [
                'amount' => 200,
                'created_at' => now(),
                'email' => 'omar.khalid@example.com',
                'name' => 'Omar Khalid',
                'payment_method' => 'Bank Transfer',
                'updated_at' => now(),
            ],
            [
                'amount' => 250,
                'created_at' => now(),
                'email' => 'aisha.siddiqui@example.com',
                'name' => 'Aisha Siddiqui',
                'payment_method' => 'Credit Card',
                'updated_at' => now(),
            ],
            [
                'amount' => 300,
                'created_at' => now(),
                'email' => 'yusuf.ahmed@example.com',
                'name' => 'Yusuf Ahmed',
                'payment_method' => 'PayPal',
                'updated_at' => now(),
            ],
            [
                'amount' => 350,
                'created_at' => now(),
                'email' => 'maryam.ali@example.com',
                'name' => 'Maryam Ali',
                'payment_method' => 'Bank Transfer',
                'updated_at' => now(),
            ],
            [
                'amount' => 400,
                'created_at' => now(),
                'email' => 'hassan.abbas@example.com',
                'name' => 'Hassan Abbas',
                'payment_method' => 'Credit Card',
                'updated_at' => now(),
            ],
            [
                'amount' => 450,
                'created_at' => now(),
                'email' => 'zainab.khan@example.com',
                'name' => 'Zainab Khan',
                'payment_method' => 'PayPal',
                'updated_at' => now(),
            ],
            [
                'amount' => 500,
                'created_at' => now(),
                'email' => 'bilal.mohammad@example.com',
                'name' => 'Bilal Mohammad',
                'payment_method' => 'Bank Transfer',
                'updated_at' => now(),
            ],
            [
                'amount' => 550,
                'created_at' => now(),
                'email' => 'saad.ibrahim@example.com',
                'name' => 'Saad Ibrahim',
                'payment_method' => 'Credit Card',
                'updated_at' => now(),
            ],
            [
                'amount' => 600,
                'created_at' => now(),
                'email' => 'nadia.malik@example.com',
                'name' => 'Nadia Malik',
                'payment_method' => 'PayPal',
                'updated_at' => now(),
            ],
            [
                'amount' => 50,
                'created_at' => '2024-06-05 08:54:19',
                'email' => 'Ali@example.com',
                'name' => 'Ali Umair',
                'payment_method' => 'credit_card',
                'updated_at' => '2024-06-05 08:54:19',
            ],
            [
                'amount' => 100,
                'created_at' => '2024-06-05 08:54:19',
                'email' => 'Ahmed@example.com',
                'name' => 'Ahmed Mansoor',
                'payment_method' => 'paypal',
                'updated_at' => '2024-06-05 08:54:19',
            ],
            [
                'amount' => 50,
                'created_at' => '2024-06-05 08:54:19',
                'email' => 'Hamza@example.com',
                'name' => 'Hamza Sohail',
                'payment_method' => 'credit_card',
                'updated_at' => '2024-06-05 08:54:19',
            ],
            [
                'amount' => 100,
                'created_at' => '2024-06-05 08:54:19',
                'email' => 'Zeeshan@example.com',
                'name' => 'Zeeshan Farooqi',
                'payment_method' => 'paypal',
                'updated_at' => '2024-06-05 08:54:19',
            ],
            [
                'amount' => 300,
                'created_at' => '2024-06-05 08:59:43',
                'email' => 'ali@gmail.com',
                'name' => 'Ali',
                'payment_method' => 'credit_card',
                'updated_at' => '2024-06-05 08:59:43',
            ],
            [
                'amount' => 1200,
                'created_at' => '2024-06-06 12:10:34',
                'email' => 'dua123@gmail.com',
                'name' => 'Dua Baji',
                'payment_method' => 'credit_card',
                'updated_at' => '2024-06-06 12:11:12',
            ],
        ]);
    }
}
