<?php

namespace App\Http\Controllers;

use App\Models\Entrepreneur;
use App\Models\Influencer;
use App\Models\Coincidence;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class CoincidenceController extends Controller
{
    public function createMatch(Request $request)
    {
        $id_user = $request->id_user;
        $user = UserController::getAuthenticatedUser();
        $content = $user->getData();
        $role = $content->user->role;
        $receiver = User::where('id', $id_user)->first();

        if (is_null($receiver)) {
            return response()->json(['response' => 'The other user does not exist'], 400);
        }

        $creator = Role::where('id', $role)->first();

        if (is_null($creator)) {
            return response()->json(['response' => 'Role does not exist'], 400);
        }

        $id_creator = $creator->id;

        if($id_creator == 1){
            $entrepreneur = Entrepreneur::where('id_user', $content->user->id)->first();
            $influencer = Influencer::where('id_user', $receiver->id)->first();

            if (is_null($influencer) ) {
                return response()->json(['response' => 'The other user is not an influencer or does not exist'], 404);
            }

            if (is_null($entrepreneur) ) {
                return response()->json(['response' => 'You are not an entrepreneur'], 404);
            }

        }else{
            $entrepreneur = Entrepreneur::where('id_user', $receiver->id)->first();
            $influencer = Influencer::where('id_user', $content->user->id)->first();

            if (is_null($influencer) ) {
                return response()->json(['response' => 'You are not an influencer'], 404);
            }

            if (is_null($entrepreneur) ) {
                return response()->json(['response' => 'The other user is not an entrepreneur or does not exist'], 404);
            }
        }

        $id_entrepreneur = $entrepreneur->id;
        $id_influencer = $influencer->id;

        Coincidence::create([
            'id_entrepreneur' => $id_entrepreneur,
            'id_influencer' => $id_influencer,
            'creator' => $id_creator,
            'accepted' => false,
            'completed' => false,
            'graded' => false,
        ]);

        return response()->json(['response' => 'Coincidence has been request!'], 201);
    }

    public function answerMatch(Request $request)
    {
        $user = UserController::getAuthenticatedUser();
        $content = $user->getData();
        $name_user =$request->name_user;
        $response = $request->response;
        $id = $request->id;
        $sender = User::where('name_user', $name_user)->first();

        if (is_null($sender)) {
            return response()->json(['response' => 'User does not exist'], 400);
        }

        $creator = $sender->role;

        if (is_null($creator)) {
            return response()->json(['response' => 'Role does not exist'], 400);
        }

        if($creator == 1){
            $influencer = Influencer::where('id_user', $content->user->id)->first();
            $entrepreneur= Entrepreneur::where('id_user', $sender->id)->first();

            if (is_null($influencer) ) {
                return response()->json(['response' => 'You are not an influencer'], 404);
            }

            if (is_null($entrepreneur) ) {
                return response()->json(['response' => 'The other user is not an entrepreneur or does not exist'], 404);
            }

        }else{
            $influencer = Influencer::where('id_user', $sender->id)->first();
            $entrepreneur= Entrepreneur::where('id_user', $content->user->id)->first();

            if (is_null($influencer) ) {
                return response()->json(['response' => 'The other user is not an influencer or does not exist'], 404);
            }

            if (is_null($entrepreneur) ) {
                return response()->json(['response' => 'You are not an entrepreneur'], 404);
            }
        }

        $match = Coincidence::where('id', $id)->where('completed', false)->first();

        if (is_null($match) ) {
            return response()->json(['response' => 'This match does not exist'], 404);
        }

        if($response == 1){
            $match->accepted = true;
        }

        $match->completed = true;

        $match->save();

        return response()->json(['response' => 'Coincidence has been completed!'], 201);
    }

    public function getMatchesRealised()
    {
        $user = UserController::getAuthenticatedUser();
        $content = $user->getData();
        $id = $content->user->id;
        $role = $content->user->role;

        if($role == 1){
            $entrepreneur= Entrepreneur::where('id_user', $id)->first();
            $id_entrepreneur = $entrepreneur->id;
            $match = User::join('influencers', 'influencers.id_user', '=', 'users.id')
                ->join('coincidences', 'coincidences.id_influencer', '=', 'influencers.id')
                ->where('id_entrepreneur', $id_entrepreneur)->where('completed', true)->where('accepted', true)
                ->select('coincidences.id','name_user','id_user','id_entrepreneur', 'id_influencer', 'creator')->get();
        }else{
            $influencer = Influencer::where('id_user', $id)->first();
            $id_influencer = $influencer->id;
            $match = User::join('entrepreneurs', 'entrepreneurs.id_user', '=', 'users.id')
                ->join('coincidences', 'coincidences.id_entrepreneur', '=', 'entrepreneurs.id')
                ->where('id_influencer', $id_influencer)->where('completed', true)->where('accepted', true)
                ->select('coincidences.id','name_user','id_user','id_entrepreneur', 'id_influencer', 'creator')->get();
        }

        if (is_null($match) ) {
            return response()->json(['response' => 'You have no matches'], 404);
        }

        return response()->json(compact('match'));
    }

    public function getMatchesRequest()
    {
        $user = UserController::getAuthenticatedUser();
        $content = $user->getData();
        $id = $content->user->id;
        $role = $content->user->role;

        if($role == 1){
            $entrepreneur= Entrepreneur::where('id_user', $id)->first();
            $id_entrepreneur = $entrepreneur->id;
            $match = User::join('influencers', 'influencers.id_user', '=', 'users.id')
                ->join('coincidences', 'coincidences.id_influencer', '=', 'influencers.id')
                ->where('id_entrepreneur', $id_entrepreneur)->where('creator', 2)->where('completed', false)
                ->select('coincidences.id','name_user','id_user','id_entrepreneur', 'id_influencer', 'creator')->get();
        }else{
            $influencer = Influencer::where('id_user', $id)->first();
            $id_influencer = $influencer->id;
            $match = User::join('entrepreneurs', 'entrepreneurs.id_user', '=', 'users.id')
                ->join('coincidences', 'coincidences.id_entrepreneur', '=', 'entrepreneurs.id')
                ->where('id_influencer', $id_influencer)->where('creator', 1)->where('completed', false)
                ->select('coincidences.id','name_user','id_user','id_entrepreneur', 'id_influencer', 'creator')->get();
        }

        if (is_null($match) ) {
            return response()->json(['response' => 'You have no matches'], 404);
        }
        return response()->json(compact('match'));
    }

    public function getMatchesWaiting()
    {
        $user = UserController::getAuthenticatedUser();
        $content = $user->getData();
        $id = $content->user->id;
        $role = $content->user->role;

        if($role == 1){
            $entrepreneur= Entrepreneur::where('id_user', $id)->first();
            $id_entrepreneur = $entrepreneur->id;
            $match = User::join('influencers', 'influencers.id_user', '=', 'users.id')
                ->join('coincidences', 'coincidences.id_influencer', '=', 'influencers.id')
                ->where('id_entrepreneur', $id_entrepreneur)->where('creator', 1)->where('completed', false)
                ->select('coincidences.id','name_user','id_user','id_entrepreneur', 'id_influencer', 'creator')->get();
        }else{
            $influencer = Influencer::where('id_user', $id)->first();
            $id_influencer = $influencer->id;
            $match = User::join('entrepreneurs', 'entrepreneurs.id_user', '=', 'users.id')
                ->join('coincidences', 'coincidences.id_entrepreneur', '=', 'entrepreneurs.id')
                ->where('id_influencer', $id_influencer)->where('creator', 2)->where('completed', false)
                ->select('coincidences.id','name_user','id_user','id_entrepreneur', 'id_influencer', 'creator')->get();
        }

        if (is_null($match) ) {
            return response()->json(['response' => 'You have no matches'], 404);
        }

        return response()->json(compact('match'));
    }
}
