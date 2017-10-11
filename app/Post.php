<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//'foreign_key'

class Post extends Model
{
    protected $fillable = ['body'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
