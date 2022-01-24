<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = "roles";

    //Relation one to many role-users
    public function users(){
        return $this->hasMany('App\Models\User');
    }

    //Relation one to many role-users
    public function matches(){
        return $this->hasMany('App\Models\Coincidence');
    }
}
