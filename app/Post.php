<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class); //post belongs to many users
    }


    // mutator, changes data before persisting to database. must follow naming convention
    // changes image path
    // public function setPostImageAttribute($value){

    //     $this->attributes['post_image']=asset("storage/".$value);

    // }

    // accessor, modifies data without persisting to database
    public function getPostImageAttribute($value){

        return asset("storage/".$value);

    }
}
