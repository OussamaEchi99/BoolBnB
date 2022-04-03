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

            <div class="mb-2"><strong>Servizi:</strong>
                @forelse ($location->features as $feature)
                    {{ $feature->name }}{{ $loop->last ? '' : ', ' }}
                @empty
                    nessuno
                @endforelse
            </div>

            <div class="mb-2">
                <strong>Indirizzo:</strong> {{$location->country}} {{$location->city}} {{$location->address}}, {{$location->number}}
            </div>

            <div class="mb-2">
                <strong>N. Stanze:</strong> {{$location->rooms}}
            </div>
            <div class="mb-2">
                <strong>N. Letti:</strong> {{$location->beds}}
            </div>
            <div class="mb-2">
                <strong>N. Bagni:</strong> {{$location->bathrooms}}
            </div>
            <div class="mb-2">
                <strong>Metri Quadri:</strong> {{$location->square_meters}}
            </div>
            <div class="mb-2">
                <strong>Prezzo (per notte):</strong> {{$location->price}} €
            </div>

            <p>{{ $location->description }}</p>

            {{-- Sponsors Buttons --}}
            <div>
                <h4>Sponsorizza la tua location:</h4>
                @foreach ($sponsors as $sponsor)
                <a class="subscription" href="{{route('host.credit-card',['sponsor' => $sponsor->id , 'location' => $location->id])}}">{{ $sponsor->subscription }}</a>
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

            {{-- <location-map :lng="{{ $location -> long }}" :lat="{{ $location -> lat }}"></location-map> --}}
        </div>


    </section>
@endsection

<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Nunito', sans-serif;
        font-weight: 200;
        height: 100vh;
        margin: 0;
    }
    .full-height {
        height: 100vh;
    }
    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }
    .position-ref {
        position: relative;
    }
    .top-right {
        position: absolute;
        right: 10px;
        top: 18px;
    }
    .content {
        text-align: center;
    }
    .title {
        font-size: 84px;
    }
    .links > a {
        color: #636b6f;
        padding: 0 25px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }
    .m-b-md {
        margin-bottom: 30px;
    }
</style>

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
    {{-- function saveSponsor(locationId, sponsorId) {

        // Mando i dati nel controller per salvarli nel db
        axios.post('/api/sponsors/store', {
            location_id: locationId,
            sponsor_id: sponsorId
        });
    }; --}}

{{-- </script> --}}
