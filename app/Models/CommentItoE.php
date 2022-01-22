<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentItoE extends Model
{
    use HasFactory;

    protected $table = "comments_ito_e";
    protected $fillable = ['id_sender', 'id_receiver', 'comment', 'score'];

    //Relation one to many influencer-commentsItoE(inverse)
    public function influencer()
    {
        return $this->belongsTo('App/Models/Influencer','id_sender','id');
    }

    //Relation one to many entrepreneur-commentsItoE(inverse)
    public function entrepreneur()
    {
        return $this->belongsTo('App/Models/Entrepreneur','id_receiver','id');
    }

    //Relation one to one match-commentitoe (inverse)
    public function coincidence() {
        return $this->belongsTo('App\Models\Coincidence');
    }

}
