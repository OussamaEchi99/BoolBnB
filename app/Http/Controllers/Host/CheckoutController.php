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

		return view('host.credit-card',compact('intent'));

    }

    public function afterPayment()
    {
        $locations_filtered = Location::where('user_id','=',Auth::id())->get();
        $data = [
            'payment' => true,
            'locations' => $locations_filtered
        ];

        return view('host.locations.index', $data);
    }
}
