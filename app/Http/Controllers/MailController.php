<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function index(){
        return view('form');
    }

    public function send(Request $request){
        $this->validate($request, [
            'name'     =>  'required',
            'email'  =>  'required|email',
            'message' =>  'required'
           ]);
           
         $data = array(
              'name'      =>  $request->input('name'),
              'message'   =>   $request->input('message')
          );
      
          $email = $request->input('email');

        Mail::to($email)->send(new SendMail($data));

        return back()->with('success', 'Enviado exitosamente!');
    }
}
