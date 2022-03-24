<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sponsor;
use App\Location;

class SponsorController extends Controller
{
    public function index() {
        $sponsors = Sponsor::all();
        $locations = Location::all();

        $data = [
            'sponsors' => $sponsors,
            'locations' => $locations
        ];

        return view('host.sponsors.index', $data);
    }
}
