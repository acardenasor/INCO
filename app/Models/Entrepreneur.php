<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrepreneur extends Model
{
    use HasFactory;

    protected $table = "entrepreneurs";
    protected $fillable = ['id_user', 'id_company'];

    //Relation one to one user-entrepreneur (inverse)
    public function user() {
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    }


    //Relation one to many company-enterpreneurs (inverse)
    public function company() {
        return $this->belongsTo('App\Models\Company');
    }

    //Relation one to many entrepreneur-ventures
    public function users(){
        return $this->hasMany('App\Models\Venture');
    }
}
