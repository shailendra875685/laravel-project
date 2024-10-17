<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function user(){
        return view('user');
    }

    public function store(Request $request){
        $request->validate([
            'username'  =>'required|min:5|max:8',
            'email'     =>'required|email',
            'password'  =>['required',Password::min(8)->letters()->numbers()->mixedCase()->symbols()], //confirmed
            'cpassword' =>'required|same:password',
            'img'       =>'required|mimes:png,jpg,gif,jpeg',
           
            
        ]);
        return "view";
    }
}
