<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function verify_user($name_user)
    {
        $user = User::where('name_user', $name_user)->first();
        if (is_null($user)) {
            return null;
        } else {
            return $user;
        }
    }

    private function verify_password($password, $passwordEntered)
    {
        if ($password == $passwordEntered) {
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
            return response()->json(['response' => 'name_user field is necessary!'], 403);
        }

        if (is_null($password)) {
            return response()->json(['response' => 'password field is necessary!'], 403);
        }

        $user = $this->verify_user($name_user);

        if (is_null($user)) {
            return response()->json(['response' => 'User not exists!'], 401);
        }

        $validPassword = $this->verify_password($user->password, $password);

        if (!$validPassword) {
            return response()->json(['response' => 'Password is incorrect!'], 401);
        }

        return response()->json([
            'response' => 'User logged!',
            'role' => $user->role
        ], 200);

    }
}
