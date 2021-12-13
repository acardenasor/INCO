<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    private function verify_user($name_user)
    {
        $user = User::where('name_user', $name_user)->first();
        if (is_null($user)) {
            return null;
        } else {
            return $user;
        }
    }

    private function verify_email($email)
    {
        $user = User::where('email', $email)->first();
        if (is_null($user)) {
            return null;
        } else {
            return $user;
        }
    }

    private function verify_cc($cc, $ccEntered)
    {
        if ($cc == $ccEntered) {
            return true;
        } else {
            return false;
        }
    }

    public function updateUser(Request $request)
    {
        $id = $request->id;
        $new_name_user = $request->name_user;
        $new_name = $request->name;
        $new_last_name = $request->last_name;
        $new_gender = $request->gender;
        $new_email = $request->email;
        $new_password = $request->password;
        $cc = $request->CC;

        if (is_null($id) || is_null($new_name_user) || is_null($new_name) || is_null($new_last_name) || is_null($new_gender) || is_null($new_email) || is_null($new_password) || is_null($cc)) {
            return response()->json(['response' => 'it is necessary to fill in all the fields'], 400);
        }

        $user = User::where('id', $id)->first();

        if (is_null($user)) {
            return response()->json(['response' => 'User do not exist!'], 404);
        }

        if (!($new_name_user == $user->name_user)) {
            $existing_user = $this->verify_user($new_name_user);
            if (!(is_null($existing_user))) {
                return response()->json(['response' => 'Username already exist!'], 400);
            }
        }
        if (!($new_email == $user->email)) {
            $existing_user = $this->verify_email($new_email);
            if (!(is_null($existing_user))) {
                return response()->json(['response' => 'The mail already exists!'], 400);
            }
        }

        if (!($this->verify_cc($user->CC, $cc))) {
            return response()->json(['response' => 'Password cannot be updated!'], 400);
        }

        $user->name_user = $new_name_user;
        $user->name = $new_name;
        $user->last_name = $new_last_name;
        $user->password = $new_password;
        $user->gender = $new_gender;
        $user->email = $new_email;

        $user->save();

        return response()->json(['response' => 'Updated information!'], 202);

    }

    public function updateCompany($id, Request $request)
    {
        $company = Company::find(id);

        $new_name = $request->name;
        $new_description = $request->description;
        $new_category = $request->category;
        $new_address = $request->address;
        $new_email = $request->email;
        $new_web_domain = $request->web_domain;
        $new_contact_number = $request->contact_number;
        $new_product_photos = $request->product_photos;
        $new_company_logo = $request->company_logo;

        if (is_null($new_name) || is_null($new_description) || is_null($new_category) || is_null($new_address) || is_null($new_web_domain) || is_null($new_email) || is_null($new_contact_number) || is_null($new_product_photos) || is_null($new_company_logo)) {
            return response()->json(['response' => 'it is necessary to fill in all the fields'], 400);
        }

        if (!($new_name == $company->name)) {
            $existing_user = $this->verify_user($new_name);
            if (!(is_null($existing_user))) {
                return response()->json(['response' => 'Name already exist!'], 401);
            }
        }
        if (!($new_email == $company->email)) {
            $existing_user = $this->verify_email($new_email);
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
        $company->web_contact_number = $new_contact_number;
        $company->web_product_photos = $new_product_photos;
        $company->web_company_logo = $new_company_logo;

        $company->save();

        return response()->json(['response' => 'Updated information!'], 201);
    }

    public function login(Request $request)
    {
        $name_user = $request->name_user;
        $password = $request->password;

        if (is_null($name_user)) {
            return response()->json(['response' => 'name_user field is necessary!'], 400);
        }

        if (is_null($password)) {
            return response()->json(['response' => 'password field is necessary!'], 400);
        }

        $credentials = $request->only('name_user', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['response' => 'invalid_credentials!'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }

    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['response' => 'User do not exist!'], 404);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['response' => 'token_expired'], $e->getStatusCode());
        } catch (TokenInvalidException $e) {
            return response()->json(['response' => 'token_invalid'], $e->getStatusCode());
        } catch (JWTException $e) {
            return response()->json(['response' => 'token_absent'], $e->getStatusCode());
        }

        return response()->json(compact('user'));
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_user' => 'required|string|max:255|unique:users'
        ]);

        if ($validator->fails()) {
            return response()->json(['response' => $validator->errors()->toJson()], 400);
        }

        $user = User::create([
            'name_user' => $request->get('name_user'),
            'name' => $request->get('name'),
            'last_name' => $request->get('last_name'),
            'password' => $request->get('password'),
            'gender' => $request->get('gender'),
            'email' => $request->get('email'),
            'CC' => $request->get('CC'),
            'role' => $request->get('role'),
        ]);

        $token = JWTAuth::fromUser($user);
        $response = 'User registered!';

        return response()->json(compact('response', 'user', 'token'), 201);
    }
}
