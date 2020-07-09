<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    protected $guarded =[];

    public function permissions(){
        return $this->belongsToMany(Permission::class); //role belongs to many permissions
    }


    public function users(){
        return $this->belongsToMany(User::class); //role belongs to many users
    }


}
