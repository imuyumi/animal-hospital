<?php

use Illuminate\Database\Seeder;

class animal_idsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animal_ids')->truncate();
        $animals=[
            ['animal' => '犬'],
            ['animal' => '猫'],
            ['animal' => 'ウサギ'],
            ['animal' => '鳥'],
            ['animal' => 'ハムスター'],
            ['animal' => 'モルモット'],
            ['animal' => '両生類'],
            ['animal' => '爬虫類'],
            ['animal' => '魚'],
            ];
            DB::table('animal_ids')->insert($animals);
    }
}
