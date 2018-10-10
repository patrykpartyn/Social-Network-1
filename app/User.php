<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','sex', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function friendsOfOther()
    {
        return $this->belongsToMany('App\User','friends','user_id','friend_id');
    }
     public function friendsOfMine()
    {
        return $this->belongsToMany('App\User','friends','friend_id','user_id');
    }

    public function friends()
    {
        return $this->friendsOfOther->merge($this->friendsOfMine);
    }
}
