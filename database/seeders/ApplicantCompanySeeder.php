<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicantCompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('applicant_companies')->insert([
            [
                'user_id' => 1,
                'company_id' => 1,
                'industry_state' => 1,  
                'selection_status_state' => 2,
                'memo' => 'タピオカのとこ',
                'salary' => '300万円〜400万円',
            ],
            [
                'user_id' => 1,
                'company_id' => 2,
                'industry_state' => 2,  
                'selection_status_state' => 2,
                'memo' => 'りんごのとこ',
                'salary' => '400万円〜500万円',
            ],
            [
                'user_id' => 1,
                'company_id' => 3,
                'industry_state' => 3,  
                'selection_status_state' => 5,
                'memo' => 'マー君のとこ',
                'salary' => '1000万円〜2000万円',
            ],
        ]);
    }
}