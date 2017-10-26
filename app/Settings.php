<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = ['min_age', 'max_age', 'user_age', 'gender', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
