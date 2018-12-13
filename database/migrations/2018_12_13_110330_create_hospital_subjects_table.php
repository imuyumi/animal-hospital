<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalSubjectsTable extends Migration
{

    public function up()
    {
        Schema::create('hospital_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('code')->default(0);
            $table->text('subject');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hospital_subjects');
    }
}
