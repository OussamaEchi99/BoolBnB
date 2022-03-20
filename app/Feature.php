<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'name',
        'slug'
    ];

    public function locations() {
        return $this->belongsToMany('App\Location');
    }
}
