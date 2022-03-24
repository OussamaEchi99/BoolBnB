<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        'category_id',
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

    public static function getUniqueSlugFromName($name) {
        $slug = Str::slug($name);
        $slug_base = $slug;

        $location_found = Location::where('slug', '=', $slug)->first();
        $counter = 1;
        while($location_found) {
            $slug = $slug_base . '-' . $counter;
            $location_found = Location::where('slug', '=', $slug)->first();
            $counter++;
        }

        return $slug;
    }
}
