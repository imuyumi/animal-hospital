<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectIdsTable extends Migration
{

    public function up()
    {
        Schema::create('subject_ids', function (Blueprint $table) {
            $table->increments('id');
            $table->text('subject'); //診察科目
        });
    }

    public function down()
    {
        Schema::dropIfExists('subject_ids');
    }
}
