<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
     protected $fillable = [
       'name',
       'phone',
       'address',
       'email',
       'facebook',
       'comment'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
