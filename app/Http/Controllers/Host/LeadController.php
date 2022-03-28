<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lead;
use App\Location;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    public function index(){
        $locations = Location::where('user_id', '=', Auth::id())->get();

        $data = [
            'locations' => $locations,
            
        ];

        return view('host.emails.index',$data);
    }

    public function show($id){
        $emails = Lead::where('location_id', '=', $id)->get();

        $data = [
            'emails' => $emails,
        ];

        return view('host.emails.show',$data);
    }
}
