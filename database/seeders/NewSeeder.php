<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class NewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('news')->insert([
                'title' => $faker->sentence,
                'content' => $faker->paragraphs(3, true), // Generates 3 paragraphs
                'short_content' => $faker->text(100),    // Generates a short text (100 characters)
                'time_day' => $faker->dateTimeThisYear()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
