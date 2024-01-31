<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id','post'
    ];

    public function Posts(){
        return $this->hasMany('App\User');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

     //フォロワー→フォロー
    public function followUsers()
    {
        return $this->belongsToMany('App\User', 'follows', 'followed_id', 'following_id');
    }

    // フォロー→フォロワー
    public function follows()
    {
        return $this->belongsToMany('App\User', 'follows', 'following_id', 'followed_id');
    }

}
