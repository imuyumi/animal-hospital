<?php

use Illuminate\Database\Seeder;

class hospital_subjectsSeeder extends Seeder
{

    public function run()
    {
         $hospital_subjects = [
            ['code' => 1, 'subject' => '外科'],
            ['code' => 2, 'subject' => '内科'],
            ['code' => 3, 'subject' => '皮膚科'],
            ['code' => 4, 'subject' => '整形外科'],
            ['code' => 5, 'subject' => '眼科'],
            ['code' => 6, 'subject' => '耳鼻科'],
            ['code' => 7, 'subject' => '循環器科'],
            ['code' => 8, 'subject' => '歯科・口腔科'],
            ['code' => 9, 'subject' => '消化器科'],
            ['code' => 10, 'subject' => '泌尿器科']
            ];
            DB::table('hospital_subjects')->insert($hospital_subjects);
            
        
    }
}
