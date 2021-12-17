<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_Entrepreneur extends Model
{
    use HasFactory;
    protected $table = "types_entrepreneurs";

    //Relation one to many category-companies
    public function companies() {
        return $this->hasMany('App\Models\Company');
    }
}
