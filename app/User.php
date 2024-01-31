<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'username', 'mail', 'password', 'images' ,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Posts(){
        return $this->hasMany(Post::class);
    }

    //フォローされている人
    public function followUsers()
    {
        return $this->belongsToMany('App\Post', 'follows', 'followed_id', 'following_id');
    }

    //フォローしている人
    public function follows()
    {
        return $this->belongsToMany('App\Post', 'follows', 'following_id', 'followed_id');
    }

}
