<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(Request $request){
        // 1つ目の処理
        $username = $request->input('username');
        // 2つ目の処理
        if(!empty($username)){
             $users = UsersController::where('username','like', '%'.$username.'%')->get();
        }
        // 3つ目の処理
        return view('users.search');
    }
}
