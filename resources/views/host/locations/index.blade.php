@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Le mie location</h1>
    <div class="row row-cols-10 row-cols-md-10 row-cols-xl-10">
        @if (!$locations->isEmpty())
            @foreach ($locations as $location)
                    <a style="min-width: 70%;" href="{{ route('host.locations.show', ['location' => $location->id]) }}" class="location mb-3">

                        <div class="image">
                            @if (str_contains($location->photo, 'location_photos'))
                                <img src="{{ asset('storage/' . $location->photo) }}" class="img-fluid img" alt="{{ $location->name }}">
                            @else
                                <img src="{{ $location->photo }}" class="img-fluid img" alt="{{ $location->name }}">
                            @endif
                        </div>


                        <div class="info">
                            <h5 class="card-title">{{ $location->name }}</h5>
                            <p class="card-text">{{ Str::substr($location->description, 0, 70) }}...</p>
                        </div>

                        {{-- @if ($payment)
                            {{-- {{ saveSponsor($location->id, sponsorId) }} --}}
                            {{-- <h1>pagamento avvenuto con successo!</h1> --}}
                        {{-- @endif --}}

                    </a>
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

<style>
.location{
    display: flex;
    flex-direction: row;
    padding: 25px 0;
    border: 1px solid lightgray;
    border-radius: 20px;
    text-decoration: none !important;
    transition: background-color 0.5s;
}

.location:hover {
    background-color: lightskyblue !important;
    color: black !important;
}

.info{
    width: 100%;
}

.image{
    margin: 0 30px;
}

.img{
    border-radius: 10px;
    transition: transform 1s;
}

img:hover {
    transform: scale(2);
}
</style>
