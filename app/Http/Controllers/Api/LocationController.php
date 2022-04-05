<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Location;
use App\Category;
use App\Feature;

class LocationController extends Controller
{
    public function index(Request $request) {

        $locations = Location::where('visible', '=', 1)->with('features', 'category')->get();

        $categories = Category::all();
        $features = Feature::all();
        $active_sponsor = [];
        foreach($locations as $location){

            if($location->sponsors()->where('end','>', date('Y-m-d H:i:s'))->count()){
                $active_sponsor[] = $location;
            }
        }

        if(!empty($locations)) {
            return response()->json([
                'success' => true,
                'results' => [
                    'locations' => $locations,
                    'categories' => $categories,
                    'activeSponsor' => $active_sponsor,
                    'features' => $features,
                ]
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => []
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
        
        if($location) {
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