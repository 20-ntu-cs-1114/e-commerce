<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    function signin(Request $request){
        $user = User::where('username', $request->input('username'))
        ->where('password',md5($request->input('password')))
        ->first();
        if($user){
            $request->session()->put('user',$user);
            return redirect('/');
        }else{
            return redirect('admin');
        }
    }
}
