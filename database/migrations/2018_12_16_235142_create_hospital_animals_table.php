<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_animals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hospital_id')->unsigned()->index();
            $table->integer('animal_id')->unsigned()->index();
            $table->timestamps();
            
            //$table->foreign(外部キーを設定するカラム名)->references(制約先のID名)->on(外部キー制約先のテーブル名);
            $table->foreign('hospital_id')->references('id')->on('hospitals')->onDelete('cascade');
            $table->foreign('animal_id')->references('id')->on('animal_ids')->onDelete('cascade');
            $table->unique(['hospital_id','animal_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospital_animals');
    }
}
