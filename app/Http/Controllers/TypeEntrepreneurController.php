<?php

namespace App\Http\Controllers;

use App\Models\Type_Entrepreneur;
use Illuminate\Http\Request;

class TypeEntrepreneurController extends Controller
{
    public function getTypeEntrepreneur(){
        $typesEntrepreneurs = Type_Entrepreneur::all();
        return response()->json(compact('typesEntrepreneurs'));
    }
}
