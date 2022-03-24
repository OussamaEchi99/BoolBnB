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
        $locations = Location::all();

        $data = [
            'user' => $user,
            'locations' => $locations
        ];

        return view('host.locations.index', $data);
    }
}
