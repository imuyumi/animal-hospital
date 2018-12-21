<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use App\Prefecture_id;
use App\Animal_id;
use App\User;
use App\Review;
use App\Hospital_animal;

class hospitalsController extends Controller
{
    public function top()
    {
        $prefectures =Prefecture_id::orderBy('id','asc')->pluck('prefecture', 'id');
        $prefectures = $prefectures -> prepend('都道府県', '');
        $animals = Animal_id::orderBy('id','asc')->pluck('animal','id');
       
         return view('welcome',[
            'prefectures' => $prefectures,
            'animals'=>$animals
            ]);
    }
    
   public function index()
    {
        $hospitals= Hospital::all();
        return view('hospitals.index',[
        'hospitals'=>$hospitals
        ]);
    }
    
    public function create(){
        $hospital=new Hospital;
        $prefectures =Prefecture_id::orderBy('id','asc')->pluck('prefecture', 'id');
        $prefectures = $prefectures -> prepend('都道府県', '');
        $animals = Animal_id::orderBy('id','asc')->pluck('animal','id');

        return view('hospitals.create',[
            'hospital'=>$hospital,
            'prefectures' => $prefectures,
            'animals'=>$animals
            ]);
    }
    
    public function store(Request $request){
        $this->validate($request,[
            //'title'=>'required|max:191',
            //'content'=>'required|max:191'
            
            ]);
        
        $hospital=new Hospital;
        
        $hospital->name=$request->name;
        $hospital->prefecture_id=$request->prefecture_id;
        $hospital->address=$request->address;
        $hospital->tel=$request->tel;
        $hospital->opening_hour=$request->opening_hour;
        $hospital->closing_hour=$request->closing_hour;
        $hospital->image_name=$request->image_name;
        $hospital->save();
        
        foreach($request->animal_id as $animal_id){
           $hospital->add_animal_id($animal_id);
         }
       
        return redirect()->route('hospitals.show',[
            'id'=>$hospital
            ]);
}
    
    public function show($id){
         
        $hospital=Hospital::find($id);
        $reviews = Review::where('hospital_id',$id)->get();
        return view('hospitals.show',[
            'hospital'=>$hospital,
            'reviews' =>$reviews
            
            ]);
    }
    
    public function edit($id){
        $hospital=Hospital::find($id);
        $prefectures =Prefecture_id::orderBy('id','asc')->pluck('prefecture', 'id');
        $prefectures = $prefectures -> prepend('都道府県', '');
        $animals = Animal_id::orderBy('id','asc')->pluck('animal','id');

        return view('hospitals.edit',[
            'hospital'=>$hospital,
            'prefectures' => $prefectures,
            'animals'=>$animals
            ]);
    }
    
     public function update(Request $request,$id){
        $this->validate($request,[
            //'title'=>'required|max:191',
            //'content'=>'required|max:191'
            
            ]);
        
        $hospital=Hospital::find($id);
        
        $hospital->name=$request->name;
        $hospital->prefecture_id=$request->prefecture_id;
        $hospital->address=$request->address;
        $hospital->tel=$request->tel;
        $hospital->opening_hour=$request->opening_hour;
        $hospital->closing_hour=$request->closing_hour;
        $hospital->image_name=$request->image_name;
        
        $hospital->save();
        
        //いったん、診療対象の動物を全削除する
        $hospital->remove_animal_id();
        
        //診療対象の動物を再登録する
        foreach($request->animal_id as $animal_id){
           $hospital->add_animal_id($animal_id);
         }
         
         return redirect()->route('hospitals.show',[
            'id'=>$hospital
            ]);
    }
    
    public function destroy($id){
        $hospital=Hospital::find($id);
        $hospital->delete();
         return view('hospitals.index',[
        'hospitals'=>$hospitals
        ]);
    }
    
    //検索結果の表示
    public function search(Request $request)
    {
         $prefecture_id=$request->prefecture_id;
         $animal_id=$request->animal_id;
         
         $hospital = new Hospital;
         //一度hospitalのインスタンスを作成
         $results = $hospital->get_search_result($animal_id,$prefecture_id);
         $result_count = $results->count();
         
          //viewに$resultをわたす
         return view('search.result',[
        'results'=>$results,
        'result_count'=>$result_count
        ]);

   }
}
