<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserCompanySelectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_company_selections')->insert([
            [
                'user_company_id' => 1,
                'step_number' => 1,
                'date' => '2021-01-01',
                'time' => '12:30 ~ 13:30',
                'interviewer' => '面接官1',
                'memo' => 'これでもかってぐらいカジュアルに話した。...選考進めないかもしれない。とりあえず、一次選考に進んだら履歴書提出しないといけないから準備する。',
            ],
            [
                'user_company_id' => 1,
                'step_number' => 4,
                'date' => '2021-01-24',
                'time' => '9:00 ~ 11:00',
                'interviewer' => '面接官2',
                'memo' => '緊張しすぎて、満足に話せなかった。...次に進めないかもしれない。',
            ],
            [
                'user_company_id' => 1,
                'step_number' => 7,
                'date' => '2021-01-31',
                'time' => '10時 ~ 11時',
                'interviewer' => '面接官3',
                'memo' => '本社に出社予定。',
            ],
            [
                'user_company_id' => 2,
                'step_number' => 4,
                'date' => '2021-02-10',
                'time' => '16時半 ~ 17時半',
                'interviewer' => '面接官1',
                'memo' => '履歴書の提出必須。',
            ],
            [
                'user_company_id' => 2,
                'step_number' => 5,
                'date' => '2021-02-25',
                'time' => '14時 ~ 15時',
                'interviewer' => '面接官2',
                'memo' => '作品みてくれるらしいので準備しとく。',
            ],
        ]);
    }
}