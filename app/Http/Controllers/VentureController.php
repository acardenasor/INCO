<?php

namespace App\Http\Controllers;

use App\Models\Entrepreneur;
use App\Models\Influencer;
use App\Models\Venture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentureController extends Controller
{
    public function createVenture(Request $request)
    {
        $user = UserController::getAuthenticatedUser();
        $content = $user->getData();
        $id_user = $content->user->id;

        $name = $request->name;
        $description = $request->description;

        if (is_null($description) || is_null($name)) {
            return response()->json(['response' => 'It is necessary to fill in all the fields'], 400);
        }
        $entrepreneur = Entrepreneur::where('id_user', $id_user)->first();

        if (is_null($entrepreneur) ) {
            return response()->json(['response' => 'You are not an entrepreneur'], 404);
        }

        $id_entrepreneur = $entrepreneur->id;

        Venture::create([
            'id_entrepreneur' => $id_entrepreneur,
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        ]);
        return response()->json(['response' => 'Venture has been created!'], 201);
    }

    public function editVenture(Request $request)
    {
        $user = UserController::g                                                                                                            ();
        $content = $user->getData();
        $id_user = $content->user->id;
        $entrepreneur = Entrepreneur::where('id_user', $id_user)->first();

        if (is_null($entrepreneur) ) {
            return response()->json(['response' => 'You are not an entrepreneur'], 404);
        }

        $id_venture = $request->id;
        $new_name = $request->name;
        $new_description = $request->description;


        if (is_null($new_description) || is_null($new_name)) {
            return response()->json(['response' => 'It is necessary to fill in all the fields'], 400);
        }

        $venture = Venture::where('id', $id_venture)->first();

        if (is_null($venture)) {
            return response()->json(['response' => 'Venture does not exist!'], 404);
        }

        $venture->name = $new_name;
        $venture->description = $new_description;

        $venture->save();

        return response()->json(['response' => 'Updated venture!'], 200);
    }

    public function getVenture($id)
    {
        $venture = Venture::where('id', $id)->first();

        if (is_null($venture)) {
            return response()->json(['response' => 'Venture does not exist!'], 400);
        }

        return response()->json($venture);
    }

    public function deleteVenture($id)
    {
        $user = UserController::getAuthenticatedUser();
        $content = $user->getData();
        $id_user = $content->user->id;
        $entrepreneur = Entrepreneur::where('id_user', $id_user)->first();

        if (is_null($entrepreneur) ) {
            return response()->json(['response' => 'You are not an entrepreneur'], 404);
        }

        $venture = Venture::where('id', $id)->first();

        if (is_null($venture)) {
            return response()->json(['response' => 'venture does not exist'], 404);
        }

        $venture->delete();

        return response()->json(['response' => 'Venture has been eliminated!'], 200);
    }
    public function getVentures(){
        return Venture::all();

        //$result = DB::table('incobasedatos1.users')
        // ->join('incobasedatos1.influencers', 'influencers.id_user', '=', 'users.id')
        // ->select('*')
        // ->get();

        // return $result;
    }

    public function getVentureCategory($id){
        return Venture::all();

        //$result = DB::table('incobasedatos1.users')
        // ->join('incobasedatos1.influencers', 'influencers.id_user', '=', 'users.id')
        // ->select('*')
        // ->get();

        // return $result;
    }
}
