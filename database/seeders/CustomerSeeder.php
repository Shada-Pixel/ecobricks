<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Customer;
use Faker\Factory as Faker;

class CustomerSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            DB::table('customers')->insert([
                'name' => $faker->firstNameMale.' '.$faker->lastName,
                'phone' => $faker->phoneNumber, // You may generate phone numbers as per your requirements
                'email' => $faker->email,
                'address' => $faker->address,
            ]);
        }
    }
}
