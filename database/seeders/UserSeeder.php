<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->truncate();

        DB::table('users')->insert([
            [
                'id'            => 1,
                'name'          => 'Nguyễn Quốc Việt',
                'email'         => 'nguyenquocviet@gmail.com',
                'password'      => bcrypt('abc123456'),
                'role'          => '0'
            ],
            [
                'id'            => 2,
                'name'          => 'Nguyễn Quốc Khánh',
                'email'         => 'nguyenquockhanh@gmail.com',
                'password'      => bcrypt('abc123456'),
                'role'          => '1'
            ],
            [
                'id'            => 3,
                'name'          => 'Nguyễn Quốc Đăng Khoa',
                'email'         => 'nguyenquocdangkhoa@gmail.com',
                'password'      => bcrypt('abc123456'),
                'role'          => '1'
            ],
            [
                'id'            => 4,
                'name'          => 'Nguyễn Quốc Đăng Khôi',
                'email'         => 'nguyenquocdangkhoi@gmail.com',
                'password'      => bcrypt('abc123456'),
                'role'          => '2'
            ],
            [
                'id'            => 5,
                'name'          => 'Nguyễn Quốc Tuấn',
                'email'         => 'nguyenquoctuan@gmail.com',
                'password'      => bcrypt('abc123456'),
                'role'          => '2'
            ],
        ]);
    }
}
