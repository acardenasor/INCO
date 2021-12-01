<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
            $role = DB::table('inco_test.users')
            ->select('users.role')
            ->where('users.name_user','=',$user)
            ->get();
            if($role[0] == 1){
                return redirect()->route('login-company');
            }elseif($role[0] == 2){
                return redirect()->route('login-influencer');
            }
            // foreach($role as $val){
            //     if($val == 1){
            //             return redirect()->route('login-company');
            //         }elseif($val == 2){
            //             return redirect()->route('login-influencer');
            //         }
            // }
            // return redirect()->routeback()->with('success', 'You are login!');
            return redirect()->route('login-influencer');
        }else{
            return back()->with('success', 'Username and password do not match');
            // return redirect()->route('loginApp');
        }

    }
    
    public function login(Request $request){
        $this->validate($request, [
            'name_user'  =>  'required',
            'password'  =>  'required'
        ]);

        $name_user = $request->input('name_user');
        $password = $request->input('password');

        $user = $this -> verify_user($name_user);

        if(is_null($user)){
            return back()->with('success', 'Unexisted user');
            //return redirect()->route('loginApp');
        }else{
            return $this->verify_password($user, $password);
        }

    }
}
