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
                'name' => 'レバテック株式会社',
                'corporation_number' => '6010401114887',
                'hp_url' => 'https://levtech.jp//',
                'location' => '東京都渋谷区渋谷２丁目２４番１２号',
            ],
            [
                'name' => '楽天グループ株式会社',
                'corporation_number' => '9010701020592',
                'hp_url' => 'https://corp.rakuten.co.jp/',
                'location' => '東京都世田谷区玉川１丁目１４番１号',
            ],
            [
                'name' => 'AppleJapan合同会社',
                'corporation_number' => '3011103003992',
                'hp_url' => 'https://www.apple.com/jp/',
                'location' => '東京都港区六本木６丁目１０番１号六本木ヒルズ',
            ]
        ]);
    }
}