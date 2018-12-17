<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal_id extends Model
{
    public function hospitals()
    {
        //animal_idに所属するhospitalを取得する
        return $this->belongsToMany(Hospital::class,'hospital_animals','animal_id','hospital_id');
    }
}
