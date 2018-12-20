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
        return $this->belongsToMany(Animal_id::class,'hospital_animals','hospital_id','animal_id');
    }

    //hospitalにanimal_idを登録する
    public function add_animal_id($animalId)
    {
        $this->animal_ids()->attach($animalId);
    }
    //hospitalに登録されているanimal_idを削除する
    public function remove_animal_id()
    {
        $this->animal_ids()->detach();
    }
    
    //検索結果を表示する。条件に合う病院だけを取得
    public function get_search_result($animalId,$prefectureId)
    {
        //hospitalsテーブルにはanimal_idカラムがないので中間テーブルであるhoapital_animalsをhospitalsテーブルと結合する
        return Hospital::join('hospital_animals', 'hospital_animals.hospital_id', 'hospitals.id')
                ->where('hospital_animals.animal_id', '=', $animalId)//[テーブル名].[カラム名]で指定
                ->where('hospitals.prefecture_id' , '=', $prefectureId)
                ->get();
    }
}
