<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'test-user',
                'email' => 'test@test.com',
                'password' => Hash::make('abcd1234'),  
            ],
            [
                'name' => 'test-user1',
                'email' => 'test1@test.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'name' => 'test-user2',
                'email' => 'test2@test.com',
                'password' => Hash::make('abcd1234'),
            ],
            [
                'name' => 'test-user3',
                'email' => 'test3@test.com',
                'password' => Hash::make('abcd1234'),
            ],
        ]);
    }
}