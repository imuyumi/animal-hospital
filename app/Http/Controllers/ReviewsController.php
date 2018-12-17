<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\User;
use App\Animal_id;
use App\Subject_id;
use App\Hospital;


class ReviewsController extends Controller
{
   
    //reviewの一覧表示:index
    //reviewのhospital_idカラムがhospitalIdと一致するものを全表示

    //review作成画面の表示:create
    public function create(Request $request)
    {
        $review = new Review;
        $review->hospital_id=$request->id;
        $subjects =Subject_id::orderBy('id','asc')->pluck('subject', 'id');
        $subjects = $subjects -> prepend('診察領域', '');
        $animals = Animal_id::orderBy('id','asc')->pluck('animal','id');
        
        return view('reviews.create',[
            'review'=>$review,
            'subjects'=>$subjects,
            'animals'=>$animals
            ]);
    } 
    
    //送られてきたreviewの登録処理:store
    public function store(Request $request)
    {
        $review = new Review;
        $review->user_id= \Auth::id();
        $review->hospital_id= $request->hospital_id;
        $review->title=$request->title;
        $review->content=$request->content;
        $review->animal_id=$request->animal_id;
        $review->subject_id=$request->subject_id;
        $review->value=$request->value;
        
        $review->save();
        $hospitals=Hospital::all();
        return view('hospitals.index',[
            'hospitals'=>$hospitals
            ]);
    }
    
    //reviewの再編集画面の表示:edit
    //reviewsの一覧表示
    public function show($id)
    {
        $reviews = Review::where('hospital_id','$id')->get();
        print_r($reviews);exit;
        
        return view('reviews.show',[
            'reviews'=>$reviews
            ]);
    }
    
    
    
    
    //reviewのアップデート:update
    
    
    //reviewの消去:delete
    
}
