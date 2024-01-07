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
                'name' => 'タピオカーニャ株式会社',
                'corporation_number' => '1111111111111',
                'hp_url' => 'https://levtech.jp//',
                'location' => '東京都渋谷区渋谷２丁目２４番１２号',
            ],

            [
                'name' => 'りんご株式会社',
                'corporation_number' => '2222222222222',
                'hp_url' => 'https://www.apple.com/jp/',
                'location' => '東京都港区六本木６丁目１０番１号六本木ヒルズ',
            ],
            [
                'name' => 'ゴールデン鷹s株式会社',
                'corporation_number' => '3333333333333',
                'hp_url' => 'https://corp.rakuten.co.jp/',
                'location' => '東京都世田谷区玉川１丁目１４番１号',
            ],
        ]);
    }
}