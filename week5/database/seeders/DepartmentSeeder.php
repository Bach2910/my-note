<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('departments')->insert([
           'name' => 'Công nghệ thông tin',
           'code' => 'CNTT',
        ]);
        DB::table('departments')->insert([
            'name' => 'Quản trị kinh doanh',
            'code' => 'QTKD',
        ]);
        DB::table('departments')->insert([
            'name' => 'Khoa học máy tính',
            'code' => 'KHTN',
        ]);
        DB::table('departments')->insert([
            'name' => 'Hệ thống thông tin',
            'code' => 'HTTT',
        ]);
        DB::table('departments')->insert([
            'name' => 'An ninh mạng',
            'code' => 'ANM',
        ]);
    }
}
