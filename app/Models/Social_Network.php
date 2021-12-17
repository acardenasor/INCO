<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Social_Network extends Model
{
    use HasFactory;

    protected $table = "social_networks";
    protected $fillable = ['id_influencer', 'facebook', 'twitter', 'instagram', 'youtube', 'snapchat', 'tik_tok', 'kawai', 'pinterest', 'twitch', 'reddit', 'weibo', 'bilibili'];

     //Relation one to one influencer-social_networks
     public function influencer() {
        return $this->belongsTo('App\Models\Influencer');
    }
}
