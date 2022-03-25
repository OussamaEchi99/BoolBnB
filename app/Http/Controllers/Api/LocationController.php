<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Location;

class LocationController extends Controller
{
    public function index() {
        $locations = Location::paginate(4);

        foreach($locations as $location){
            if(str_contains($location->photo, 'location_photos')){
                $location->photo = url('storage/' . $location->photo);
            }else{
                $location->photo;
            }
        }
        
        if($location->visible){
            return response()->json([
                'success' => true,
                'results' => $locations
            ]);
        }
    }

    public function show($slug) {
        $location = Location::where('slug', '=', $slug)->with(['category', 'features'])->first();

        if(str_contains($location->photo, 'location_photos')){
            $location->photo = url('storage/' . $location->photo);
        }else{
            $location->photo;
        }
        
        if($location && $location->visible) {
            return response()->json([
                'success' => true,
                'results' => $location
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => []
            ]);
        }
    }
}