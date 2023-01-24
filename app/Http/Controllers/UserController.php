<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Http\Request;
use TheSeer\Tokenizer\Exception;

class UserController extends Controller
{

    protected $fillable = ['username'];
    //
    function signup(Request $request)
    {
        $user = new User();
        $user->email = $request->input('email');
        $user->username = $request->input('username');
        $user->password = md5($request->input('password'));
        $user->role = "normal";
        $userSave = $user->save();
        $request->session()->put('user', $request->input());
        if ($userSave) {
            return redirect('/');
        } else {
            return redirect('signup');
        }
    }
    function signin(Request $request)
    {
        $user = User::where('username', $request->input('username'))
            ->where('password', md5($request->input('password')))
            ->first();
        if ($user) {
            $request->session()->put('user', $user);
            if ($user->role == "normal")
                return redirect('/');
            else if ($user->role = "admin")
                return redirect('admin');

        } else
            return redirect("/signin?signin=fail");

    }
}
