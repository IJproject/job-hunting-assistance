<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            [
                'name' => 'Google',
                'hp_url' => 'https://www.google.com/',
            ],
            [
                'name' => 'Amazon',
                'hp_url' => 'https://www.amazon.co.jp/',
            ],
            [
                'name' => 'Apple',
                'hp_url' => 'https://www.apple.com/jp/',
            ]
        ]);
    }
}