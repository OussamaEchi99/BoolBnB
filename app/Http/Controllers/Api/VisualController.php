<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visual;
use App\User;
use App\Location;
use Illuminate\Support\Facades\Auth;

class VisualController extends Controller
{
    public function index() {
        $user = auth()->user();
        dd($user);
    }

    public function store(Request $request, ?User $user, Location $location) {
        $data = $request->all();
        dd($data);

        $new_visual = new Visual();
        $new_visual->ip = $data['ip'];
        $new_visual->date = date("Y-m-d");
        $new_visual->location_id = $data['location_id'];

        
        // Prendo la location con "id" uguale a "location_id" che arriva da $data.
        $location = Location::where('id', '=', $data['location_id'])->first();
        // dd($location);


        // Prendo il proprietario della location.
        $location_user = $location->user_id;
        // dd($location_user);

        // $user = auth()->user();
        // dd($location);

        // Se non sono io il proprietario calcolo la visual altrimenti no.
        // if(!$user->id === $location->user_id) {
        //     $new_visual->save();
        // }

        $new_visual->save();

        // return response()->json([
        //     if(!$user->id === $location->user_id) {
        //         $new_visual->save();
        //     },
        //     'success' => true
        // ]);

        // ['location' => $new_location->id]
    }
}
