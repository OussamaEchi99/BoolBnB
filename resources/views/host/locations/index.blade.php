@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-3">Le mie location</h1>
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
        @if (!$locations->isEmpty())
            @foreach ($locations as $location)
                <div class="col">
                    <div class="card mt-2">

                        @if (str_contains($location->photo, 'location_photos'))
                            <img src="{{ asset('storage/' . $location->photo) }}" class="card-img-top" alt="{{ $location->name }}">
                        @else
                            <img src="{{ $location->photo }}" class="card-img-top" alt="{{ $location->name }}">
                        @endif


                        <div class="card-body">
                            <h5 class="card-title">{{ $location->name }}</h5>
                            <p class="card-text">{{ Str::substr($location->description, 0, 70) }}...</p>
                            <a href="{{ route('host.locations.show', ['location' => $location->id]) }}" class="btn btn-primary">Vai alla location</a>
                        </div>

                        {{-- @if ($payment)
                            {{-- {{ saveSponsor($location->id, sponsorId) }} --}}
                            {{-- <h1>pagamento avvenuto con successo!</h1> --}}
                        {{-- @endif --}}

                    </div>
                </div>
            @endforeach

        @else
            <span>Non hai ancora nessun annuncio</span>
        @endif


        {{-- Payment success message --}}
        @if (isset($payment) && $payment)
            
            <checkout-message><checkout-message/>

        @endif
        
    </div>
</div>
@endsection
