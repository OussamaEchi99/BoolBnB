<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Location;
use App\Visual;
use App\Lead;

class StatisticController extends Controller
{
    public function index()
    {
        $locations = Location::where('user_id', '=', Auth::id())->get();

        $data = [
            'locations' => $locations
        ];

        return view('host.statistics.index', $data);
    }

    public function show($id)
    {
        $location = Location::findOrFail($id);
        $visuals = Visual::where('location_id', '=', $id)->get();
        $lastMonth =  date("Y-m-d H:i:s",strtotime("-1 month"));
        $lastYear = date("Y-m-d H:i:s",strtotime("-1 year"));
        $todayVisual = Visual::where('location_id', '=', $id)
                        ->where('date', '=', date("Y-m-d"))->get();
        $monthVisuals = Visual::where('location_id', '=', $id)
                        ->where('date', '>', $lastMonth)->get();
        $yearVisuals = Visual::where('location_id', '=', $id)
                        ->where('date', '>', $lastYear)->get();

        $emails = Lead::where('location_id', '=', $id)->get();
        $todayEmails = Lead::where('location_id', '=', $id)
                        ->where('created_at', '=', date("Y-m-d"))->get();
        $monthEmails = Lead::where('location_id', '=', $id)
                                        ->where('created_at', '>', $lastMonth)->get();
        $yearEmails = Lead::where('location_id', '=', $id)
                                        ->where('created_at', '>', $lastYear)->get();

        $data = [
            'location' => $location,
            'visuals' => $visuals,
            'todayVisuals' => $todayVisual,
            'monthVisuals' => $monthVisuals,
            'yearVisuals' => $yearVisuals,
            'emails' => $emails,
            'todayEmails' => $todayEmails,
            'monthEmails' => $monthEmails,
            'yearEmails' => $yearEmails
        ];
        
        return view('host.statistics.show', $data);
    }
}
