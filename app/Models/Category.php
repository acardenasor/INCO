<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";
    

    //Relation one to many category-influencers
    public function influencers() {
        return $this->hasMany('App\Models\Influencer');
    }
                                                                   

    //Relation one to many category-companies
    public function companies() {
        return $this->hasMany('App\Models\Company');
    }
}
