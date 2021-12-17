<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = "companies";
    protected $fillable = ['name', 'nit', 'web_domain', 'address', 'description', 'category', 'email', 'contact_number'];

    public $timestamps = false;

    //Relation one to many company-enterpreneurs
    public function entrepreneurs() {
        return $this->hasMany('App\Models\Entrepreneur');
    }


    //Relation one to many types_entrepreneurs-companies (inverse)
    public function category() {
        return $this->belongsTo('App\Models\Type_Entrepreneur');
    }
}
