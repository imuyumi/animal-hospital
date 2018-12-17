<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use App\Prefecture_id;
use App\Animal_id;
use App\User;
use App\Review;

class hospitalsController extends Controller
{
    public function search()
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
        // //検索結果の表示
        // $search_animal_id = Request::get('animal_id');
        // $search_prefecture_id = Request::get('prefecture_id');
        
        // if(!empty($search_animal_id) && !empty( $search_prefecture_id)) 
        // {
        // $hospitals=DB::table('hospitals')->where('prefecture_id','$search_prefecture_id');
        // $hospitals=DB::table('hospitals')->where('animal_id','$search_animal_id');
        // }
        
        // return view('hospitals.index', [
        //     'hospitals'=>$hospitals
        //     ]);
        
        
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
        $hospital->animal_id=$request->animal_id;
        $hospital->image_name=$request->image_name;
        
        $hospital->save();
        return redirect('hospitals.index');
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
        return view('hospitals.edit',[
            'hospital'=>$hospital
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
        $hospital->animal_id=$request->animal_id;
        $hospital->image_name=$request->image_name;
        
        $hospital->save();
        return redirect('hospitals.show');
    }
    
    public function destroy($id){
        $hospital=Hospital::find($id);
        $hospital->delete();
        return redirect('hospitals.index');
    }
}
