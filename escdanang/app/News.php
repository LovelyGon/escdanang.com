<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
     protected $fillable = [
       'title',
       'description',
       'image',
       'content',
       'submit_date',
       'content',
       'user_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function customer()
    {
        return $this->hasMany('App\Customer');
    }
}
