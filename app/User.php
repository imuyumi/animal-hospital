<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];
    //userが書いたreviewを取得
     public function get_reviews()
     {
         //return $this->hasMany(Review::class);
         //return $this->hasMany(Review::class)->join('hospitals','hospitals.id','reviews.hospital_id');
         return $this->hasMany(Review::class);
     }
}
