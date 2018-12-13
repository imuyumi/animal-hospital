<?php

use Illuminate\Database\Seeder;

class animal_typesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $animal_types=[
            ['code' => 1, 'type' => '犬'],
            ['code' => 2, 'type' => '猫'],
            ['code' => 3, 'type' => 'ウサギ'],
            ['code' => 4, 'type' => '鳥'],
            ['code' => 5, 'type' => 'ハムスター'],
            ['code' => 6, 'type' => 'モルモット'],
            ['code' => 7, 'type' => '両生類'],
            ['code' => 8, 'type' => '爬虫類'],
            ['code' => 9, 'type' => '魚'],
            ];
            DB::table('animal_types')->insert($animal_types);
    }
}
