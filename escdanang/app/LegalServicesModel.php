<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalServicesModel extends Model
{
     protected $fillable = [
        'service_name',
        'short_description',
        'description',
        'image',
        'type_of_service',
        'price'
    ];
}
