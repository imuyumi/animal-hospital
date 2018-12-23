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
       
        $this->call('subject_idsSeeder');
        
        Schema::disableForeignKeyConstraints();

        $this->call('animal_idsSeeder');

        Schema::enableForeignKeyConstraints();
    }
}
