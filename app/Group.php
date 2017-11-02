<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function creator(){

    	return $this->belongsTo(User::class);
    }

    public function users(){
        
        return $this->belongsToMany(Group::class, 'groupables', 'group_id', 'user_id');
    }



}
