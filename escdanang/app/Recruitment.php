<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    protected $fillable = [
       'comary_name',
       'title',
       'submit_date',
       'content',
       'discription',
       'position',
       'expry_date',
       'partner_id',
       'partner_id' 
    ];
    public function partner()
    {
        return $this->belongsTo('App\partner');
    }
}
