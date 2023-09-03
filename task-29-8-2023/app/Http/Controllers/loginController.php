<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\login;

class loginController extends Controller
{
    public function login(Request $request){
        $user = login::where('email', $request->email)->first();
        // dd($user);
        if( $user && $user->password == $request->password){
            return redirect('/home');
        }else {
            return redirect('/login');
        }

       
    }
}
