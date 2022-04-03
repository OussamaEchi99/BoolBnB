<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Sponsor;
use App\Location;

class CheckoutController extends Controller
{

    public function checkout(Request $request)
    {   
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51Kk6zsHQslSFqM4OGaKQzC90qwF3C0t4QAjCxfUL4B51DUuMohMhCO7okQeXdMKyzTNT0uSiEXoMGVU4Kj7bWzW8001dZ4xAjC');
        $data = $request->all();
        $sponsorsAll = Sponsor::all();

        foreach ($sponsorsAll as $sponsor) {
            if($sponsor->id == $data['sponsor'])
                $sponsorchosen = $sponsor;
        }
        $location = $data['location'];
        		
		$amount = $sponsorchosen->price;
		$amount *= 100;
        $amount = (float) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => $sponsorchosen->name,
			'amount' => $amount,
			'currency' => 'eur',
			'description' => $sponsor->description,
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('host.credit-card',compact('intent', 'sponsorchosen','location'));

    }

    public function afterPayment(Request $request)
    {   
        $locations_filtered = Location::where('user_id','=',Auth::id())->get();
        $dataIn = $request->all();
        $sponsor = $dataIn['sponsor'];
        $location = $dataIn['location']; 

        $new_sponsor = new Sponsor();
        $new_sponsor->location_id = $location;
        $new_sponsor->sponsor_id = $sponsor;
        $new_sponsor->start = date('Y-m-d H:i:s');

        // Prendo lo sponsor con "id" ugule a "sponsor_id"
        $sponsor = Sponsor::where('id', '=', $sponsor)->first();

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

        $data = [
            'payment' => true,
            'locations' => $locations_filtered,
        ];

        return view('host.locations.index', $data);
    }
}
