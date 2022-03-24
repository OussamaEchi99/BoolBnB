<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Location;
use App\Visual;

class StatisticController extends Controller
{
    public function index()
    {
        $locations = Location::all();

        $data = [
            'locations' => $locations
        ];

        return view('host.statistics.index', $data);
    }

    public function show($id)
    {
        $location = Location::findOrFail($id);
        $visuals = Visual::where('location_id', '=', $id)->get();
        $todayVisuals = Visual::where('location_id', '=', $id)
                        ->where('date', '=', date("Y-m-d"))->get();

        $data = [
            'location' => $location,
            'visuals' => $visuals,
            'todayVisuals' => $todayVisuals
        ];
        
        return view('host.statistics.show', $data);
    }
}
