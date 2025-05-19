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
                'classroom_id' => $faker->numberBetween(1,10),
                'student_code' => $faker->unique()->randomNumber(4),
                'full_name' => $faker->name,
                'gender' => $faker->randomElement(['male', 'female']),
                'birth_date' => $faker->date,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'image' => $faker->imageUrl(),
                'address' => $faker->address,
            ]);
        }
    }
}
