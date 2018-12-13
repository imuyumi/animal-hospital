<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function show($id)
    {
        $user= User::find($id);
        return view ('users.show',[
            'user'=>$user
            ]);
    }
    public function reviews($id)
    {
        $reviews = DB::table('reviews')->where('user_id',$id)->get();
        return view();
    }
}
