<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicantCompanyQaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('applicant_company_qas')->insert([
            [
                'applicant_company_id' => 1,
                'about_company_quetion_state' => 1,
                'answer' => '創業1500年の老舗の中の老舗。看板メニューは創業時から注ぎ足され続けてきたミルクティーに、溢れんばかりのタピオカを詰め込んだ「ミルクティー和えタピオカ」。',
                'answer_date' => '2021-01-01',
            ],
            [
                'applicant_company_id' => 1,
                'about_company_quetion_state' => 2,
                'answer' => 'タピオカを日常的に摂取したいから。',
                'answer_date' => '2021-01-22',
            ],
            [
                'applicant_company_id' => 2,
                'about_company_quetion_state' => 3,
                'answer' => 'アワヨクバ、リンゴニナリタイ',
                'answer_date' => '2021-01-31',
            ]
        ]);
    }
}