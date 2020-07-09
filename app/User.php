<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username','profile_pic'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value){   //mutator to encrypt password everytime password is changed or created
        $this->attributes['password'] = bcrypt($value);
    }

    public function posts(){
        return $this->hasMany(Post::class); //user has many posts
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class); //user belongs to many permissions
    }

    public function roles(){
        return $this->belongsToMany(Role::class); //user belongs to many roles
    }

    public function userHasRole($role_name){ //checks to see if user has specified role
        foreach ($this->roles as $role) {
            if($role_name == $role->name){
                return true;
            }
        }
        return false;
    }

    public function getProfilePicAttribute($value){

        return asset("storage/".$value);

    }
}
