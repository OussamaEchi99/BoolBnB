<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'location_slug',
        'email',
        'name',
        'object',
        'message'
    ];
}
