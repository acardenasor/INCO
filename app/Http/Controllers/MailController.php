<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function index()
    {
        return view('resetPass');
    }

    public function change_password($email, $new_password)
    {
        $user = User::where('email', $email)->first();
        $user->password = $new_password;
        $user->save();
    }

    public function generate_new_password()
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($permitted_chars), 0, 8);
    }

    public function find_user($email)
    {
        return User::where('email', $email)->first();
    }

    public function send(Request $request)
    {
        $email = $request->email;

        if (is_null($email)) {
            return response()->json(['response' => 'email field is necessary!'], 403);
        }

        $user = $this->find_user($email);

        if (is_null($user)) {
            return response()->json(['response' => 'email not exists!'], 400);
        }

        $new_password = $this->generate_new_password();

        $data = array(
            'name' => 'Hola ' . $user->name_user,
            'message' => 'Tu nueva contraseña es ' . $new_password,
            'recomendation' => 'Por favor vuelve a iniciar sesión'
        );

        Mail::to($email)->send(new SendMail($data));
        $this->change_password($email, $new_password);

        return response()->json(['response' => 'Email message has send!'], 200);
    }
}
