<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
     protected $table = "contacts";
     protected $fillable = [
     	'name',
     	'phone',
     	'email',
        'website',
        'comment'
    ];
}
