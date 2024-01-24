<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserQaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_qas')->insert([
            [
                'user_id' => 1,
                'question_number' => 1,
                'answer' => '現在、ホワイトハッカーとして生計を立てているtest-userと申します。',
                'answer_date' => '2021-01-01',
            ],
            [
                'user_id' => 1,
                'question_number' => 2,
                'answer' => 'ホワイトハッカーとしての経験があるため、セキュリティに関する知識が豊富です。',
                'answer_date' => '2021-01-22',
            ],
            [
                'user_id' => 1,
                'question_number' => 3,
                'answer' => '長所は背が高いことです。短所は背が高すぎて、電車の中では床に座っていないと天井に頭が当たってしまうことです。',
                'answer_date' => '2021-01-31',
            ]
        ]);
    }
}