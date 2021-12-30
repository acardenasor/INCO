<?php

namespace App\Http\Controllers;

use App\Models\Entrepreneur;
use App\Models\Venture;
use Illuminate\Http\Request;

class VentureController extends Controller
{
    public function createVenture(Request $request)
    {
        $user = UserController::getAuthenticatedUser();
        $content = $user->getData();
        $id_user = $content->user->id;

        $name = $request->category;
        $description = $request->description;

        if (is_null($description) || is_null($name)) {
            return response()->json(['response' => 'it is necessary to fill in all the fields'], 400);
        }

        $entrepreneur = Entrepreneur::where('id_user', $id_user)->first();
        $id_entrepreneur = $entrepreneur->id;

        Venture::create([
            'id_user' => $id_entrepreneur,
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        ]);
        return response()->json(['response' => 'Venture has been created!'], 201);
    }
}
