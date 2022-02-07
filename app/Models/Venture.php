<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venture extends Model
{
    use HasFactory;

    protected $table = "ventures";

    protected $fillable = ['name', 'description', 'id_entrepreneur'];

    //Relation one to many entrepreneur-ventures (inverse)
    public function role()
    {
        return $this->belongsTo('App/Models/Entrepreneur');
    }

    //Relation one to one venture-match
    public function coincidence()
    {
        return $this->hasOne('App\Models\Coincidence', 'id_venture', 'id');
    }
}
