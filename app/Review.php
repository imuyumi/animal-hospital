<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //reviewに登録されているペットの種類を表
    public function animal()
    {
        return $this->belongsTo('App\Animal_id');
    }
    //reviewに登録されている診察領域を表示
    public function subject()
    {
        return $this->belongsTo('App\Subject_id');
    }
}
