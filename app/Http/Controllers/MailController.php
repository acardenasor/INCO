<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    
    public function index(){
        return view('form');
    }

    public function change_password($email, $new_password){
        $user = User::where('email', $email)->first();
        $user->password =  $new_password;
        $user->save();
    }

    public function generate_new_password(){
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        return substr(str_shuffle($permitted_chars), 0, 8);
    }

    public function find_user($email){
        $user = User::where('email', $email)->first();
        return $user ->name_user;
    }

    public function send(Request $request){
        $this->validate($request, [
            'email'  =>  'required|email'
        ]);
           
         $email = $request->input('email');
         $name_user = $this -> find_user($email);
         $new_password = $this -> generate_new_password();
           
         $data = array( 
            //'name'      =>  $request->input('name'),
            'name'      =>  'Hola '. $name_user,
            'message'   =>  'Tu nueva contraseña es '. $new_password,
            'recomendation' => 'Porfavor vuelve a iniciar sesión'
          );
      
        Mail::to($email)->send(new SendMail($data));
        $this -> change_password($email, $new_password);

        return back()->with('success', 'Enviado exitosamente!');
    }
}
