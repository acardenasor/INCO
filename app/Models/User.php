<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Model implements JWTSubject, AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = "users";
    protected $fillable = ['name_user', 'name', 'last_name', 'unencrypted_password', 'password', 'gender', 'email', 'CC', 'role'];

    //Relation one to many role-users (inverse)
    public function role()
    {
        return $this->belongsTo('App/Models/Role');
    }


    //Relation one to one user-influencer
    public function influencer()
    {
        return $this->hasOne('App\Models\Influencer', 'id_user', 'id');
    }


    //Relation many to one user-enterpreneurs
    public function entrepreneurs()
    {
        return $this->hasMany('App\Models\Enterpreneur');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
