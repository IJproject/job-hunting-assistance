<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_companies')->insert([
            [
                'user_id' => 1,
                'company_number' => '1234567890123',
                'job' => 'WEBエンジニア',  
                'status_number' => 2,
                'memo' => 'タピオカのとこ',
                'salary' => '300万円〜400万円',
            ],
            [
                'user_id' => 1,
                'company_number' => '2345678901234',
                'job' => 'ホワイトハッカー',  
                'status_number' => 2,
                'memo' => 'りんごのとこ',
                'salary' => '400万円〜500万円',
            ],
            [
                'user_id' => 1,
                'company_number' => '3456789012345',
                'job' => '世界征服',  
                'status_number' => 5,
                'memo' => 'マー君のとこ',
                'salary' => '1000万円〜2000万円',
            ],
        ]);
    }
}