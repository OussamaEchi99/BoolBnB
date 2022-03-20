<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'photo',
        'lat',
        'long',
        'rooms',
        'beds',
        'bathrooms',
        'square_meters',
        'price',
        'visible',
        'description'
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function features() {
        return $this->belongsToMany('App\Feature');
    }

    public function visuals() {
        return $this->belongsToMany('App\Visual');
    }

    public function sponsors() {
        return $this->belongsToMany('App\Sponsor');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
