<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        $customerIds = DB::table('customers')->pluck('id')->toArray();

        foreach(range(1, 100) as $index) {
            DB::table('food')->insert([
                'food_name' => $faker->word,
                'customer_id' => $faker->randomElement($customerIds),
                'price' => $faker->numberBetween(1000, 10000),
                'detail'=>$faker->text(255),
            ]);
        }
    }
}
