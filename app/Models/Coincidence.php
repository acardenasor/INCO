<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coincidence extends Model
{
    use HasFactory;

    protected $table = "coincidences";
    protected $fillable = ['id_entrepreneur', 'id_influencer', 'id_venture', 'creator', 'accepted', 'completed', 'active', 'graded'];

    //Relation one to many influencer-matches (inverse)
    public function influencer()
    {
        return $this->belongsTo('App/Models/Influencer');
    }

    //Relation one to many entrepreneur-matches (inverse)
    public function entrepreneur()
    {
        return $this->belongsTo('App/Models/Entrepreneur');
    }

    //Relation one to one match-commentitoe
    public function commentsItoE()
    {
        return $this->hasOne('App\Models\CommentItoE', 'id_match', 'id');
    }

    //Relation one to one match-commentetoi
    public function commentsetoi()
    {
        return $this->hasOne('App\Models\CommentEtoI', 'id_match', 'id');
    }

    //Relation one to many role-matches (inverse)
    public function role()
    {
        return $this->belongsTo('App/Models/Role');
    }

    //Relation one to one venture-match (inverse)
    public function venture() {
        return $this->belongsTo('App\Models\Venture');
    }
}
