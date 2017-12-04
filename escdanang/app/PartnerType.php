<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerType extends Model
{
    protected $fillable = [
        'partner_name',
        'description'
    ];
    public function partner()
    {
        return $this->hasMany('App\Partner');
    }
}
