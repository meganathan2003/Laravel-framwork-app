<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run(): void
    {
        $customers = [
            [
                "name" => 'dinesh',
                'email' => 'dinesh@gmail.com',
                'phonenumber' => '8778719738',
            ],
            [
                "name" => 'mega',
                'email' => 'mega@gmail.com',
                'phonenumber' => '8778719738',
            ]
        ];
        DB::table('customers')->insert($customers); // we need to import the table and insert the data
    }

}
