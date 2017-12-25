<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner_Type extends Model
{    
	 protected $table = 'partner_type';
     protected $fillable = [
       'name'
    ];
}
