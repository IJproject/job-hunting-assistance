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
                'about_user_quetion_state' => 1,
                'answer' => 'ここには回答1が入ります。ここには回答1が入ります。ここには回答1が入ります。ここには回答1が入ります。',
                'answer_date' => '2021-01-01',
            ],
            [
                'user_id' => 1,
                'about_user_quetion_state' => 2,
                'answer' => 'ここには回答2が入ります。ここには回答2が入ります。ここには回答2が入ります。ここには回答2が入ります。',
                'answer_date' => '2021-01-22',
            ],
            [
                'user_id' => 1,
                'about_user_quetion_state' => 3,
                'answer' => 'ここには回答3が入ります。ここには回答3が入ります。ここには回答3が入ります。ここには回答3が入ります。',
                'answer_date' => '2021-01-31',
            ]
        ]);
    }
}