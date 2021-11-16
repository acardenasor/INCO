<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Influencer;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function storeUser(Request $request)
    {
        $user = new User();
        $user->name_user = $request->name_user;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->password = $request->password;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->CC = $request->CC;
        $user->role = $request->role;

        $user->save();

        $role = $request->role;
        if($role == 1){
            return redirect()->route('login-company');
        }elseif($role == 2){
            return redirect()->route('login-influencer');
        }

    }
    public function storeCompany(Request $request)
    {
        $company = new Company();
        $company->name = $request->name;
        $company->nit = $request->nit;
        $company->web_domain = $request->web_domain;
        $company->address = $request->address;
        $company->description = $request->description;
        $company->category = $request->category;
        $company->email = $request->email;
        $company->contact_number = $request->contact_number;

        $company->save();

        return redirect()->route('welcome');

    }

    public function storeInfluencer(Request $request)
    {
        $user = new Influencer();
        $user->name_user = $request->name_user;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->password = $request->password;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->CC = $request->CC;
        $user->role = $request->role;

        $user->save();

        $role = $request->role;
        if($role == 1){
            return redirect()->route('login-company');
        }elseif($role == 2){
            return redirect()->route('login-influencer');
        }

    }
}

