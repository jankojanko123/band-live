<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name
    protected  $table = 'posts';

    public  $primaryKey = 'id';

    //public  $attributes = 'id'; //somehow broke everything

    public  $timestamps = 'true';

    public function user()
    {
        return $this->belongsTo('App\User'); // a post has a relation ship with the user and belongs to a user
    }
}
