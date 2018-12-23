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
        $this->validate($request,[
            'title'=>'required|max:191',
            'content'=>'required|max:191',
            'hospital_id'=>'required|max:191',
            'animal_id'=>'required|max:191',
            'value'=>'required|max:191',
            ]);
            
        $review = new Review;
        $review->user_id= \Auth::id();
        $review->hospital_id= $request->hospital_id;
        $review->title=$request->title;
        $review->content=$request->content;
        $review->animal_id=$request->animal_id;
        $review->subject_id=$request->subject_id;
        $review->value=$request->value;
        
        $review->save();
        return redirect()->route('hospitals.show',[
            'id'=>$review->hospital_id

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
    
    
    public function edit($id)
    {
        $review = Review::find($id);
        $subjects =Subject_id::orderBy('id','asc')->pluck('subject', 'id');
        $subjects = $subjects -> prepend('診察領域', '');
        $animals = Animal_id::orderBy('id','asc')->pluck('animal','id');
        
        return view('reviews.edit',[
            'review'=>$review,
            'subjects'=>$subjects,
            'animals'=>$animals
            ]);
    } 
    
    //reviewのアップデート:update
        public function update(Request $request,$id)
    {
        $review = Review::find($id);
        $review->user_id= \Auth::id();
        $review->hospital_id= $request->hospital_id;
        $review->title=$request->title;
        $review->content=$request->content;
        $review->animal_id=$request->animal_id;
        $review->subject_id=$request->subject_id;
        $review->value=$request->value;
        
        $review->save();
        return redirect()->route('users.show',[
            'id'=>\Auth::id()
            ]);
    }
    
    //reviewの消去:delete
    public function destroy($id)
    {
       $review = Review::find($id);
       $review->delete();
       return redirect()->route('users.show',[
            'id'=>\Auth::id()
            ]);
       
    }
}
