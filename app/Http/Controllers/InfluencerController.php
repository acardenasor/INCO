<?php

namespace App\Http\Controllers;

use App\Models\Influencer;
use App\Models\Social_Network;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfluencerController extends Controller
{
    public function registerInfluencer(Request $request)
    {
        $user = UserController::getAuthenticatedUser();
        $content = $user->getData();
        $id_user = $content->user->id;
        $id_role = $content->user->role;

        if ($id_role == 1) {
            return response()->json(['response' => 'You are not an influencer!'], 400);
        }

        $new_description = $request->description;
        $new_category = $request->category;

        if (is_null($new_description) || is_null($new_category)) {
            return response()->json(['response' => 'it is necessary to fill in all the fields'], 400);
        }

        $influencer = Influencer::create([
            'id_user' => $id_user,
            'description' => $request->get('description'),
            'category' => $request->get('category'),
        ]);

        $id_influencer = $influencer->id;

        Social_Network::create([
            'id_influencer' => $id_influencer,
            'facebook' => $request->get('facebook'),
            'twitter' => $request->get('twitter'),
            'instagram' => $request->get('instagram'),
            'youtube' => $request->get('youtube'),
            'snapchat' => $request->get('snapchat'),
            'tik_tok' => $request->get('tik_tok'),
            'kawai' => $request->get('kawai'),
            'pinterest' => $request->get('pinterest'),
            'twitch' => $request->get('twitch'),
            'reddit' => $request->get('reddit'),
            'weibo' => $request->get('weibo'),
            'bilibili' => $request->get('bilibili'),
        ]);

        return response()->json(['response' => 'Influencer has been created!'], 201);
    }

    public function getInfluencer()
    {
        $user = UserController::getAuthenticatedUser();
        $content = $user->getData();
        $id_user = $content->user->id;
        $influencer = Influencer::where('id_user', $id_user)->first();

        if (is_null($influencer)) {
            return response()->json(['response' => 'User not have influencer!'], 400);
        }

        return response()->json($influencer);
    }

    public function getInformationInfluencer(){

        $user = UserController::getAuthenticatedUser();
        $content = $user->getData();
        $id_user = $content->user->id;
        $influencer = Influencer::where('id_user', $id_user)->first();

        if (is_null($influencer)) {
            return response()->json(['response' => 'User not have influencer!'], 400);
        }

        $description = $influencer->description;
        $category=$influencer->category;

        return response()->json(compact('description', 'category'));
    }

    public function updateUser(Request $request)
    {
        $user = UserController::getAuthenticatedUser();
        $content = $user->getData();
        $id = $content->user->id;

        $new_name_user = $request->name_user;
        $new_name = $request->name;
        $new_description = $request->description;
        $new_category = $request->category;
        $new_last_name = $request->last_name;
        $new_gender = $request->gender;
        $new_email = $request->email;
        $new_password = $request->password;
        $cc = $request->CC;

        if (is_null($id) || is_null($new_name_user) || is_null($new_name) || is_null($new_last_name) || is_null($new_gender) || is_null($new_email) || is_null($new_password) || is_null($cc)) {
            return response()->json(['response' => 'it is necessary to fill in all the fields'], 400);
        }

        $user = User::where('id', $id)->first();
        $influencer = Influencer::where('id_user', $id)->first();

        if (is_null($influencer)) {
            return response()->json(['response' => 'Influencer do not exist!'], 404);
        }

        if (is_null($user)) {
            return response()->json(['response' => 'User do not exist!'], 404);
        }

        if (!($new_name_user == $user->name_user)) {
            $existing_user = UserController::verify_user($new_name_user);
            if (!(is_null($existing_user))) {
                return response()->json(['response' => 'Username already exist!'], 400);
            }
        }
        if (!($new_email == $user->email)) {
            $existing_user = UserController::verify_email($new_email);
            if (!(is_null($existing_user))) {
                return response()->json(['response' => 'The mail already exists!'], 400);
            }
        }

        if (!(UserController::verify_cc($user->CC, $cc))) {
            return response()->json(['response' => 'Password cannot be updated!'], 400);
        }

        $user->name_user = $new_name_user;
        $user->name = $new_name;
        $user->last_name = $new_last_name;
        $user->unencrypted_password = $new_password;
        $user->password = bcrypt($new_password);
        $user->gender = $new_gender;
        $user->email = $new_email;

        $influencer->description = $new_description;
        $influencer->category = $new_category;

        $user->save();

        $influencer->save();


        return response()->json(['response' => 'Updated information!'], 202);

    }
    public function file1(Request $request){
        //$foto = new ElectionNomination;
        if($request->hasFile('photos')){
            $name_file = $request->file('photos')->getClientOriginalName();
            $path = $request->file('photos')->storeAs('public/storage',$name_file);
            $data=array(

                'path'=>$path,
                'status'=>'success'
            );
            //$foto->Main_file = $name_file;
            $user = UserController::getAuthenticatedUser();
            $content = $user->getData();
            $id = $content->user->id;
            $user = User::where('id', $id)->first();
            $user-> profile_picture = $name_file;
            $user-> save();

            return response()->json($data,200);}
        // }else{
        //     return ['status'=> false, 'message'=> 'Ha ocurrido un error'];
        // }

        // if($foto->save()){
        //     return ['status'=> true, 'message'=> 'Archivo subido exitosamente'];
        // }else{
        //     return ['status'=> false, 'message'=> 'Ha ocurrido un error'];
        // }
    }

    public function getInfluencers(){
        $result = User::join('influencers', 'influencers.id_user', '=', 'users.id')
            ->join('categories', 'categories.id', '=', 'influencers.category')
            ->select('influencers.id AS id','users.name_user','influencers.description','influencers.category', 'categories.name', 'users.id AS id_user')->get();

        if(is_null($result)){
            return response()->json(['response' => 'There are no ventures'], 404);
        }else{
            return $result;
        }
    }

    public function getInfluencerByID($id)
    {
        $influencer = Influencer::where('id', $id)->first();

        if (is_null($influencer)) {
            return response()->json(['response' => 'Influencer does not exist!'], 400);
        }
        $result = DB::table('incobasedatos1.users')
        ->join('incobasedatos1.influencers', 'influencers.id_user', '=', 'users.id')
        ->where('influencers.id','=',$id)
        ->select('*')
        ->get();

        return $result;
    }

    public function getSocialNetworks()
    {
        $user = UserController::getAuthenticatedUser();
        $content = $user->getData();
        $id_user = $content->user->id;
        $influencer = Influencer::where('id_user', $id_user)->first();

        if (is_null($influencer)) {
            return response()->json(['response' => 'User is not influencer!'], 400);
        }

        $id_influencer = $influencer->id;
        $social_networks = Social_Network::where('id_influencer', $id_influencer)->first();

        return response()->json(compact('social_networks'));
    }
}
