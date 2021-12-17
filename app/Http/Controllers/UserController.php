<?php

namespace App\Http\Controllers;

use App\Models\Influencer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public static function verify_user($name_user)
    {
        $user = User::where('name_user', $name_user)->first();
        if (is_null($user)) {
            return null;
        } else {
            return $user;
        }
    }

    public static function verify_email($email)
    {
        $user = User::where('email', $email)->first();
        if (is_null($user)) {
            return null;
        } else {
            return $user;
        }
    }

    public static function verify_cc($cc, $ccEntered)
    {
        if ($cc == $ccEntered) {
            return true;
        } else {
            return false;
        }
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

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['response' => 'User logout!'], 200);
    }

    public static function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['response' => 'User do not exist!'], 404);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['response' => 'token_expired'], 401);
        } catch (TokenInvalidException $e) {
            return response()->json(['response' => 'token_invalid'], 401);
        } catch (JWTException $e) {
            return response()->json(['response' => 'token_absent'], 401);
        }

        return response()->json(compact('user'));
    }

    public function register(Request $request)
    {
        $name_user = $request->name_user;
        $name = $request->name;
        $last_name = $request->last_name;
        $gender = $request->gender;
        $email = $request->email;
        $role = $request->role;
        $password = $request->password;
        $cc = $request->CC;

        if (is_null($role) || is_null($name_user) || is_null($name) || is_null($last_name) || is_null($gender) || is_null($email) || is_null($password) || is_null($cc)) {
            return response()->json(['response' => 'it is necessary to fill in all the fields'], 400);
        }

        $validator = Validator::make($request->all(), [
            'name_user' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        if ($validator->fails()) {
            return response()->json(['response' => $validator->errors()->toJson()], 400);
        }

        $user = User::create([
            'name_user' => $request->get('name_user'),
            'name' => $request->get('name'),
            'last_name' => $request->get('last_name'),
            'unencrypted_password' => $request->get('password'),
            'password' => bcrypt($request->get('password')),
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
