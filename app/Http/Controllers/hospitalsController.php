<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use App\Prefecture_code;
use App\Animal_type;
use App\User;

class hospitalsController extends Controller
{
    public function search()
    {
        $prefectures =Prefecture_code::orderBy('code','asc')->pluck('name', 'code');
        $prefectures = $prefectures -> prepend('都道府県', '');
        $animal_types = Animal_type::orderBy('code','asc')->pluck('type','code');
         return view('welcome',[
            'prefectures' => $prefectures,
            'animal_types'=>$animal_types
            ]);
    }
    
    public function index()
    {
        //検索結果の表示
        $hospitals= Hospital::all();
        return view('hospitals.index',[
            'hospitals'=>$hospitals
            ]);
    }
    
    public function create(){
        $hospital=new Hospital;
        $prefectures =Prefecture_code::orderBy('code','asc')->pluck('name', 'code');
        $prefectures = $prefectures -> prepend('都道府県', '');
        $animal_types = Animal_type::orderBy('code','asc')->pluck('type','code');
        

        return view('hospitals.create',[
            'hospital'=>$hospital,
            'prefectures' => $prefectures,
            'animal_types'=>$animal_types
            ]);
    }
    
    public function store(Request $request){
        $this->validate($request,[
            //'title'=>'required|max:191',
            //'content'=>'required|max:191'
            
            ]);
        
        $hospital=new Hospital;
        
        $hospital->name=$request->name;
        $hospital->prefecture_code=$request->prefecture_code;
        $hospital->address=$request->address;
        $hospital->tel=$request->tel;
        $hospital->opening_hour=$request->opening_hour;
        $hospital->animal_types=$request->animal_types;
        $hospital->image_name=$request->image_name;
        
        $hospital->save();
        return redirect('hospitals.index');
}
    
    public function show($id){
        $hospital=Hospital::find($id);
       
        return view('hospitals.show',[
            'hospital'=>$hospital
            
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
        $hospital->prefecture_code=$request->prefecture_code;
        $hospital->address=$request->address;
        $hospital->tel=$request->tel;
        $hospital->opening_hour=$request->opening_hour;
        $hospital->animal_types=$request->animal_types;
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
