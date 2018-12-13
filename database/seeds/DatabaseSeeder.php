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
        $this->call('prefecture_codesSeeder');
        $this->call('animal_typesSeeder');
        $this->call('hospital_subjectsSeeder');
    }
}
