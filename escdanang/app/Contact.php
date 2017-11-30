<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
     protected $fillable = [
       'website',
       'comment',
       'customer_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
