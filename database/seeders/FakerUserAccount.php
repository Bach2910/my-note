<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class FakerUserAccount extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = User::create([
            'name'=>'admin',
            'email'=>'admin@example.com',
            'password'=>Hash::make(12345),
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name'=>'student',
            'email'=>'student@example.com',
            'password'=>Hash::make(12345),
        ]);
        $user->assignRole('student');

        $user = User::create([
            'name'=>'teacher',
            'email'=>'teacher@example.com',
            'password'=>Hash::make(12345),
        ]);
        $user->assignRole('teacher');
    }
}
