<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = "users";

    //Relation one to many role-users (inverse)
    public function role(){
        return $this->belongsTo('App/Models/Role');
    }

    

    //Relation one to one user-influencer
    public function influencer() {
        return $this->hasOne('App\Models\Influencer', 'id_user', 'id');
    }

    

    //Relation many to one user-enterpreneurs
    public function entrepreneurs() {
        return $this->hasMany('App\Models\Enterpreneur');
    }
}