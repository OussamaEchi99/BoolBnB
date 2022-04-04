<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Location;

class HomeController extends Controller
{
    public function index() {
        $user = Auth::user();
        $locations_filtered = Location::where('user_id','=',Auth::id())->get();
    
        $data = [
            'user' => $user,
            'locations' => $locations_filtered
        ];

        return view('host.dashboard.index', $data);
    }
}
