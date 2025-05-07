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
            DB::table('classes')->insert([
                'name' => 'CNTT'.$i,
                'description' => $faker->sentence(),
            ]);
        }
    }
}
