<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visual extends Model
{
    public function locations() {
        return $this->belongsTo('App\Location');
    }
}
