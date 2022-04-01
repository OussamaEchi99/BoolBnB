<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Location;
use App\Category;

class LocationController extends Controller
{
    public function index(Request $request) {

        $data = $request->all();
        // dd($data);

        // $category = $data['category'];

        $locations = Location::all();
        $categories = Category::all();
        $sponsored = [];

        // foreach($locations as $location){
        //     dd($location->sponsors);
        // }
        // $category = Category::where('id', '=', $category)->first();

        // $filtered_locations = [];

        // foreach($locations as $location){
        //     if(str_contains($location->photo, 'location_photos')){
        //         $location->photo = url('storage/' . $location->photo);
        //     }else{
        //         $location->photo;
        //     }
        // }

        // if($category == '') {
        //     return response()->json([
        //         'success' => true,
        //         'results' => $locations
        //     ]);
        // } else {
        //     foreach($locations as $location){
        //         if($location->category_id == $category->id && $location->visible){
        //             $filtered_locations[] = $location;
        //         }
        //     }
        // }

        // if() {
            // foreach($locations as $location){
            //     if($location->category_id == $category->id && $location->visible){
            //         $filtered_locations[] = $location;
            //     }
            // }

            // if(is_null($filtered_locations)) {
            //     $filtered_locations[] = $locations;
            // }
        // }

        // foreach($locations as $location){
        //     if(str_contains($location->photo, 'location_photos')){
        //         $location->photo = url('storage/' . $location->photo);
        //     }else{
        //         $location->photo;
        //     }
        // }

        // dd($locations);

        if(!empty($locations)) {
            return response()->json([
                'success' => true,
                'results' => [
                    'locations' => $locations,
                    'categories' => $categories
                ]
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => []
            ]);
        }




        // foreach($locations as $location){
        //     if(str_contains($location->photo, 'location_photos')){
        //         $location->photo = url('storage/' . $location->photo);
        //     }else{
        //         $location->photo;
        //     }
        // }
        
        // if($location->visible){
        //     return response()->json([
        //         'success' => true,
        //         'results' => $locations
        //     ]);
        // }
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