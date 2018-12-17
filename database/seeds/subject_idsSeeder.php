<?php

use Illuminate\Database\Seeder;

class subject_idsSeeder extends Seeder
{

    public function run()
    {
        DB::table('subject_ids')->truncate();
         $subjects = [
            ['subject' => '外科'],
            ['subject' => '内科'],
            ['subject' => '皮膚科'],
            ['subject' => '整形外科'],
            ['subject' => '眼科'],
            ['subject' => '耳鼻科'],
            ['subject' => '循環器科'],
            ['subject' => '歯科・口腔科'],
            ['subject' => '消化器科'],
            ['subject' => '泌尿器科']
            ];
            DB::table('subject_ids')->insert($subjects);
            
        
    }
}
