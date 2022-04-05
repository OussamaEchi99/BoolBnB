<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Lead;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\LocationContactMail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{   
    public function take(){
        $usernow = Auth::id();
        return response()->json([
            'success' => true,
            'results' => $usernow
        ]);
            
    }

    public function store(Request $request) {
        $data = $request->all();
        
        $validator = Validator::make($data, [
            'location_id' => 'required',
            'name' => 'required|max:255',
            'object' => 'required|max:255',
            'email' => 'required|max:255',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
        $new_lead = new Lead();
        $new_lead->fill($data);

        $new_lead->save();
        Mail::to('customerservice@boolbnb.it')->send(new LocationContactMail($new_lead));

        return response()->json([
            'success' => true
        ]);
    }
}
