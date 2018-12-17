<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Prefecture_id;

class Hospital extends Model
{
    //各hospitalのもつprefecture_codeを取得する
    public function prefecture()
    {
        return $this->belongsTo('App\Prefecture_id','prefecture_id', 'id');
    }
    //hospitalがもつanimal_idを取得する
    public function animal_ids()
    {
        return $this->belongsToMany('Animal_id::class','hospital_id','animal_id');
    }
}
