<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        for($i = 0;$i<=10;$i++){
            DB::table('students')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'student_id' => $faker->unique()->randomNumber(4),
                'address' => $faker->address,
                'gender' => $faker->randomElement(['male', 'female']),
                'image' => $faker->imageUrl(),
                'class_id' => $faker->numberBetween(1,10),
            ]);
        }
    }
}
