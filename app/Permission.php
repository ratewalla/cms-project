<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Permission extends Model
{
    protected $guarded =[];

    public function roles(){
        return $this->belongsToMany(Role::class); //permissions can belong to many roles
    }

    public function users(){
        return $this->belongsToMany(User::class); //permissions can belong to many users
    }
}
