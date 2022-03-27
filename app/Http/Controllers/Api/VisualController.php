<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visual;

class VisualController extends Controller
{
    public function store(Request $request) {
        $data = $request->all();

        // dd($data);


        $new_visual = new Visual();
        // $new_visual->fill($data);
        $new_visual->ip = $data['ip'];
        $new_visual->date = date("Y-m-d");
        $new_visual->location_id = $data['location_id'];

        // dd($new_visual);
        $new_visual->save();
    }
}
