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
        if($this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id')){
            return $this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id');
        }else {
            return $this->belongsToMany('App\User', 'friends', 'friend_id', 'user_id');
        }
    }

    public function settings(){

        return $this->hasOne(Settings::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function groups(){
        return $this->belongsToMany(Group::class, 'groupables', 'user_id', 'group_id');
    }

    // public function groupables(){
        
    //         return $this->belongsToMany(Group::class, 'groupables', 'user_id');
        
    // }


}
