<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        for($i = 0; $i<=10; $i++){
            DB::table('classrooms')->insert([
                'department_id' => $faker->numberBetween(1,5),
                'class_code' => $faker->name,
                'name' => 'CNTT'.$i,
                'course_year' => $faker->year,
                'max_students' => $faker->numberBetween(30,50),
            ]);
        }
    }
}
