<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function show($id)
    {
        $user= User::find($id);
        $reviews = $user->get_reviews;
        return view ('users.show',[
            'user'=>$user,
            'reviews'=>$reviews
            ]);
    }
    
    public function reviews($id)
    {
        $reviews = DB::table('reviews')->where('user_id',$id)->get();
        return view();
    }
    
}
