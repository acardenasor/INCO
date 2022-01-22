<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Entrepreneur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    public function getCompany()
    {
        $user = UserController::getAuthenticatedUser();
        $content = $user->getData();
        $id_user = $content->user->id;
        $entrepreneur = Entrepreneur::where('id_user', $id_user)->first();

        if (is_null($entrepreneur)) {
            return response()->json(['response' => 'User not have company!'], 400);
        }

        $id_company = $entrepreneur->id_company;
        $company = Company::where('id', $id_company)->first();

        return response()->json(compact('company'));
    }

    public function registerCompany(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:companies',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        if ($validator->fails()) {
            return response()->json(['response' => $validator->errors()->toJson()], 400);
        }

        $user = UserController::getAuthenticatedUser();
        $content = $user->getData();
        $id_user = $content->user->id;
        $id_role = $content->user->role;

        if ($id_role == 2) {
            return response()->json(['response' => 'You are not an entrepreneur!'], 400);
        }

        $company = Company::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'category' => $request->get('category'),
            'nit' => $request->get('nit'),
            'address' => $request->get('address'),
            'web_domain' => $request->get('web_domain'),
            'email' => $request->get('email'),
            'contact_number' => $request->get('contact_number'),
        ]);

        $id_company = $company->id;

        Entrepreneur::create([
            'id_user' => $id_user,
            'id_company' => $id_company,
        ]);

        return response()->json(['response' => 'Company has created!'], 201);
    }

    public function updateCompany(Request $request)
    {
        $new_name = $request->name;
        $new_description = $request->description;
        $new_category = $request->category;
        $new_address = $request->address;
        $new_email = $request->email;
        $new_web_domain = $request->web_domain;
        $new_contact_number = $request->contact_number;

        if (is_null($new_name) || is_null($new_description) || is_null($new_category) || is_null($new_address) || is_null($new_web_domain) || is_null($new_email) || is_null($new_contact_number)) {
            return response()->json(['response' => 'it is necessary to fill in all the fields'], 400);
        }

        $user = UserController::getAuthenticatedUser();
        $content = $user->getData();
        $id_user = $content->user->id;

        $entrepreneur = Entrepreneur::where('id_user', $id_user)->first();
        $id_company = $entrepreneur->id_company;
        $company = Company::where('id', $id_company)->first();

        if (!($new_name == $company->name)) {
            $existing_user = UserController::verify_user($new_name);
            if (!(is_null($existing_user))) {
                return response()->json(['response' => 'Name already exist!'], 401);
            }
        }
        if (!($new_email == $company->email)) {
            $existing_user = UserController::verify_email($new_email);
            if (!(is_null($existing_user))) {
                return response()->json(['response' => 'The mail already exists!'], 402);
            }
        }

        $company->name = $new_name;
        $company->description = $new_description;
        $company->category = $new_category;
        $company->address = $new_address;
        $company->email = $new_email;
        $company->web_domain = $new_web_domain;
        $company->contact_number = $new_contact_number;

        $company->save();

        return response()->json(['response' => 'Updated information!'], 201);
    }
}
