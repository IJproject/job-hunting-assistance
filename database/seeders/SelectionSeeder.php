<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SelectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('selections')->insert([
            [
                'applicant_company_id' => 1,
                'selection_step_state' => 1,
                'date' => '2021-01-01 10:00:00',
                'interviewer' => '面接官1',
                'memo' => 'ここにはメモが入ります。ここにはメモが入ります。ここにはメモが入ります。ここにはメモが入ります。',
            ],
            [
                'applicant_company_id' => 1,
                'selection_step_state' => 2,
                'date' => '2021-01-24 16:00:00',
                'interviewer' => '面接官2',
                'memo' => 'ここにはメモが入ります。ここにはメモが入ります。ここにはメモが入ります。ここにはメモが入ります。',
            ],
            [
                'applicant_company_id' => 1,
                'selection_step_state' => 3,
                'date' => '2021-01-31 14:30:00',
                'interviewer' => '面接官3',
                'memo' => 'ここにはメモが入ります。ここにはメモが入ります。ここにはメモが入ります。ここにはメモが入ります。',
            ],
            [
                'applicant_company_id' => 2,
                'selection_step_state' => 1,
                'date' => '2021-02-10 09:00:00',
                'interviewer' => '面接官1',
                'memo' => 'ここにはメモが入ります。ここにはメモが入ります。ここにはメモが入ります。ここにはメモが入ります。',
            ],
            [
                'applicant_company_id' => 2,
                'selection_step_state' => 2,
                'date' => '2021-02-25 12:00:00',
                'interviewer' => '面接官2',
                'memo' => 'ここにはメモが入ります。ここにはメモが入ります。ここにはメモが入ります。ここにはメモが入ります。',
            ],
        ]);
    }
}