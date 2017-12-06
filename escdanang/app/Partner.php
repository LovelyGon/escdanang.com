<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
       'comary_name',
       'address',
       'email',
       'website',
       'phone',
       'partnerType' 
    ];
    public function tour()
    {
        return $this->hasMany('App\Tour');
    }
    public function recruitment()
    {
        return $this->hasMany('App\Recruitment');
    }
}