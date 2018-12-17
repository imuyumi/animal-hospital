<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('prefecture_idsSeeder');
        $this->call('animal_idsSeeder');
        $this->call('subject_idsSeeder');
    }
}
