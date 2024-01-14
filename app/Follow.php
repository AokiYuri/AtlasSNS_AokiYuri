<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
        'following_id','followed_id'
    ];

    //フォロワー→フォロー
    public function followUsers()
    {
        return $this->belongsToMany('App\User', 'follow_users', 'followed_id', 'following_id');
    }

    // フォロー→フォロワー
    public function follows()
    {
        return $this->belongsToMany('App\User', 'follow_users', 'following_id', 'followed_id');
    }

}
