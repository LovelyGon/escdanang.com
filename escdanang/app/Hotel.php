<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'tour_name',
        'description',
        'partner_id'
    ];
    public function partner()
    {
        return $this->belongTo('App\Partner');
    }
}
