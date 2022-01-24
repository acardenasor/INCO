<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentEtoI extends Model
{
    use HasFactory;

    protected $table = "comments_eto_i";
    protected $fillable = ['id_sender', 'id_receiver', 'comment', 'score'];

    //Relation one to many influencer-commentsEtoI(inverse)
    public function influencer()
    {
        return $this->belongsTo('App/Models/Influencer','id_receiver','id');
    }

    //Relation one to many entrepreneur-commentsEtoI(inverse)
    public function entrepreneur()
    {
        return $this->belongsTo('App/Models/Entrepreneur','id_sender','id');
    }

    //Relation one to one match-commentetoi (inverse)
    public function coincidence() {
        return $this->belongsTo('App\Models\Coincidence');
    }
}
