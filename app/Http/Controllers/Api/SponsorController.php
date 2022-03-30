<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sponsor;
use App\Location;

class SponsorController extends Controller
{
    
    public function store(Request $request) {

        $data = $request->all();
        

        $new_sponsor = new Sponsor();
        $new_sponsor->location_id = $data['location_id'];
        $new_sponsor->sponsor_id = $data['sponsor_id'];
        $new_sponsor->start = date('Y-m-d H:i:s');

        // Prendo lo sponsor con "id" ugule a "sponsor_id"
        $sponsor = Sponsor::where('id', '=', $data['sponsor_id'])->first();

        // Prendo la durata in ore dello sponsor
        $sponsor_duration = $sponsor->duration;

        // Aggiungo le ore dello sponsor alla data attuale
        $new_sponsor->end = date('Y-m-d H:i:s', strtotime('+' . $sponsor_duration . 'hours'));
        
        $location = new Location();

        // Salvo i dati nella tabella pivot
        $location->sponsors()->attach($new_sponsor, [
            'location_id' => $new_sponsor->location_id,
            'sponsor_id' => $new_sponsor->sponsor_id,
            'start' => $new_sponsor->start,
            'end' => $new_sponsor->end
        ]);
        
    }
}
