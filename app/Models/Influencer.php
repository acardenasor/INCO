<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Influencer extends Model
{
    use HasFactory;

    protected $table = "influencers";
    protected $fillable = ['id_user', 'category', 'description'];

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

    //Relation one to many influencer-comentsItoE
    public function commentsItoE(){
        return $this->hasMany('App\Models\CommentItoE');
    }

    //Relation one to many influencer-comentsEtoI
    public function commentsetoi(){
        return $this->hasMany('App\Models\CommentEtoI');
    }

    //Relation one to many influencer-matches
    public function coincidences(){
        return $this->hasMany('App\Models\Coincidence');
    }
}
