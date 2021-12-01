<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginRController extends Controller
{
    public function verify_user($name_user){
        $user = User::where('name_user', $name_user)->first();
        if(is_null($user)){
            return null;
        }else{
            return $user->password;
        }
    }

    public function verify_password($user, $password){

        if($user == $password){
            //return back()->with('success', 'You are login!');
            return redirect()->route('login-influencer');
        }else{
            //return back()->with('success', 'Username and password do not match');
            return redirect()->route('loginApp');
        }

    }
    
    public function login(Request $request){
        $this->validate($request, [
            'user'  =>  'required',
            'password'  =>  'required'
        ]);

        $name_user = $request->input('user');
        $password = $request->input('password');

        $user = $this -> verify_user($name_user);

        if(is_null($user)){
            //return back()->with('success', 'Unexisted user');
            return redirect()->route('loginApp');
        }else{
            return $this->verify_password($user, $password);
        }

    }
}
