<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    public function posts()
    {
        return $this->hasMany('App\Post', 'user_id');
    }

    public function likes(){
        return $this->hasMany('App\Like');
    }

    public function friends(){
        if($this->belongsToMany(User::friends(), 'friends', 'user_id', 'friend_id')){
            return $this->belongsToMany(User::friends(), 'friends', 'user_id', 'friend_id');
        }else {
            return $this->belongsToMany(User::friends(), 'friends', 'friend_id', 'user_id');
        }
        return null;

    }
}
