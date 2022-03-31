@extends('layouts.app')

@section('content')
    <section id="show">
        <div class="container">
            <h1>{{ $location->name }}</h1>
            
            <div class="img-fluid">
                @if (str_contains($location->photo, 'location_photos'))
                    <img src="{{ asset('storage/' . $location->photo) }}" class="big_picture rounded mb-3" alt="{{ $location->name }}">
                @else
                    <img src="{{ $location->photo }}" class="big_picture rounded mb-3" alt="{{ $location->name }}">
                @endif
            </div>

            <div class="mb-2"><strong>Categoria:</strong> {{ $location->category ? $location->category->name : 'nessuna' }}</div>

            <div class="mb-2"><strong>Features:</strong>
                @forelse ($location->features as $feature)
                    {{ $feature->name }}{{ $loop->last ? '' : ', ' }}
                @empty
                    nessuna
                @endforelse
            </div>

            <div class="mb-2">
                <strong>Indirizzo:</strong> {{$location->country}} {{$location->city}} {{$location->address}}, {{$location->number}}
            </div>

            <div class="mb-2">
                <strong>Camere:</strong> {{$location->rooms}}
            </div>
            <div class="mb-2">
                <strong>Posti letto:</strong> {{$location->beds}}
            </div>
            <div class="mb-2">
                <strong>Bagni:</strong> {{$location->bathrooms}}
            </div>
            <div class="mb-2">
                <strong>Metri quadrati:</strong> {{$location->square_meters}} 
            </div>
            <div class="mb-2">
                <strong>Prezzo a notte:</strong> {{$location->price}} €
            </div>         
               
            <p>{{ $location->description }}</p>

            {{-- Sponsors Buttons --}}
            <div>
                <h4>Sponsorizza il tuo appartamento</h4>
                @foreach ($sponsors as $sponsor)
                <button class="subscription" onclick="saveSponsor({{ $location->id }}, {{ $sponsor->id }})">{{ $sponsor->subscription }}</button>
                @endforeach
            </div>

            <div>
                <a href="{{ route('host.locations.edit', ['location' => $location->id]) }}">Modifica location</a>
            </div>

            <div class="mt-3">
                <form action="{{ route('host.locations.destroy', ['location' => $location->id]) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger" onclick="return confirm('Sei sicuro di voler cancellare?')">Cancella</button>
                </form>
            </div>

            <payament-section><payament-section/>

            <location-map :lng="{{ $location -> long }}" :lat="{{ $location -> lat }}"></location-map>

        </div>
    </section>
@endsection

{{-- <script>
    var button = document.querySelector('#submit-button');

braintree.dropin.create({
  authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
  selector: '#dropin-container'
}, function (err, instance) {
  button.addEventListener('click', function () {
    instance.requestPaymentMethod(function (err, payload) {
      // Submit payload.nonce to your server
    });
  })
});
</script> --}}
