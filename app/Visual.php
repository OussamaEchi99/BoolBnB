<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visual extends Model
{
    protected $fillable = [
        'ip',
        // 'date',
        'location_id'
    ];

    public function locations() {
        return $this->belongsTo('App\Location');
    }
}
