<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
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
    public function gallery()
    {
        return $this->hasMany('App\Gallery');
    }
}
