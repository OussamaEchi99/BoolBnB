<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = [
        'subscription',
        'slug',
        'description',
        'price',
        'duration'
    ];

    public function locations() {
        return $this->belongsToMany('App\Location');
    }

}
