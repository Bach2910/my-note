<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class FakeUserAccount extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = User::create([
           'name' => 'admin',
           'email' => 'admin@example.com',
           'password'=>Hash::make('12345'),
        ]);

        $admin->assignRole('admin');

        $admin = User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password'=>Hash::make('12345'),
        ]);

        $admin->assignRole('user');

        $admin = User::create([
            'name' => 'guest',
            'email' => 'guest@example.com',
            'password'=>Hash::make('12345'),
        ]);

        $admin->assignRole('guest');
    }
}
