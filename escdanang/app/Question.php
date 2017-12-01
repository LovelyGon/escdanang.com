<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'content',
        'user_id'
    ];
    public function user()
    {
        return $this->belongTo('App\User');
    }
     public function comment()
    {
        return $this->hasMany('App\Comment');
    }
}
