<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{

    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('hospital_id');
            $table->string('title');
            $table->text('content');
            $table->integer('animal_id');
            $table->integer('subject_id');
            $table->integer('value');
            $table->timestamps();
            
            //外部キー制約userテーブルに紐づける。
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
