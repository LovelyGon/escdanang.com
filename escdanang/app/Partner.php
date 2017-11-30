<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{
    protected $fillable = [
       'comary_name',
       'address',
       'email',
       'website',
       'phone',
       'user_id' 
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}