<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\User;
use App\Animal_type;
use App\Hospital_subject;


class ReviewsController extends Controller
{
   
    //reviewの一覧表示:index
    //reviewのhospital_idカラムがhospitalIdと一致するものを全表示
    public function index($id)
    {
        $reviews = Review::whereIn('hospital_id',$id);
        return view('reviews.index',[
            'reviews'=>$reviews
            ]);
    }
    
    //review作成画面の表示:create
    public function create()
    {
        $review = new Review;
        // $review->hospital_id=$this->id;
        $hospital_subjects =Hospital_subject::orderBy('code','asc')->pluck('subject', 'code');
        $hospital_subjects = $hospital_subjects -> prepend('診察領域', '');
        $animal_types = Animal_type::orderBy('code','asc')->pluck('type','code');
        
        return view('reviews.create',[
            'review'=>$review,
            'hospital_subjects'=>$hospital_subjects,
            'animal_types'=>$animal_types
            ]);
    } 
    
    //送られてきたreviewの登録処理:store
    
    
    //reviewの再編集画面の表示:edit
    
    
    //reviewのアップデート:update
    
    
    //reviewの消去:delete
    
}
