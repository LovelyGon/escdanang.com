<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
     protected $fillable = [
       'discount',
       'start_date',
       'end_date',
       'user_id'
    ];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
