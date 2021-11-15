<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Influencer extends Model
{
    use HasFactory;

    protected $table = "influencers";

    //Relation one to one user-influencer
    public function user() {
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    }
    

    //Relation one to one influencer-social_networks
    public function social_networks() {
        return $this->hasOne('App\Models\Social_Network');
    }
    

    //Relation one to many category-influencers (inverse)
    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
}
