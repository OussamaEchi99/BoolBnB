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
                    
                    @if ($feature->name)
                        @if ($feature->name == 'Wifi' )
                            {{ $feature->name }} <i class="fas fa-wifi"></i> {{ $loop->last ? '' : ', ' }}   
                        @else
                            {{ $feature->name }}{{ $loop->last ? '' : ', ' }}
                        @endif
                    @endif
                @empty
                    nessuno
                @endforelse
            </div>

            <div class="mb-2">
                <strong>Indirizzo:</strong> {{$location->country}} {{$location->city}} {{$location->address}}, {{$location->number}}
            </div>

            <section class="rooms_section">
                <div class="mb-2">
                    <strong>N. Stanze:</strong> <span>{{$location->rooms}} <i class="fas fa-door-closed"></i></span>
                </div>
                <div class="mb-2">
                    <strong>N. Letti:</strong> <span>{{$location->beds}} <i class="fas fa-bed"></i></span>
                </div>
                <div class="mb-2">
                    <strong>N. Bagni:</strong> <span>{{$location->bathrooms}} <i class="fas fa-bath"></i></span>
                </div>
                <div class="mb-2">
                    <strong>Metri Quadri:</strong> <span>{{$location->square_meters}} <i class="fas fa-ruler"></i></span>
                </div>
                <div class="mb-2">
                    <strong>Prezzo (per notte):</strong> <span>{{$location->price}} € <i class="fas fa-money-bill"></i></span>
                </div>
            </section>

            <section class="description">
                <p>{{ $location->description }}</p>
            </section>

            {{-- Sponsors Buttons --}}
            <div class="sponsors">
                <h4>Sponsorizza la tua location:</h4>
                <div class="sponsor">
                    @foreach ($sponsors as $sponsor)
                        {{-- <a class="subscription" href="{{route('host.credit-card',['sponsor' => $sponsor->id , 'location' => $location->id])}}">{{ $sponsor->subscription }}</a> --}}
                        <div id="{{ $sponsor->subscription }}" class="subscription">
                            <h3>{{ $sponsor->subscription }}</h3>
                            <p>{{ $sponsor->description }}</p>
                            <div>
                                <a class="btn btn-dark" href="{{route('host.credit-card',['sponsor' => $sponsor->id , 'location' => $location->id])}}">Aquista</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="modify">
                <a class="btn btn-primary" href="{{ route('host.locations.edit', ['location' => $location->id]) }}">Modifica</a>
            </div>

            <div class="mt-3 delete_form">
                <form id="delete" action="{{ route('host.locations.destroy', ['location' => $location->id]) }}" method="post">
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

    /* SPONSOR */
    .sponsors{
        border: 1px solid lightgray;
        padding: 30px 15px;
        border-radius: 25px;
        margin: 30px 0;
    }

    .sponsor {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        margin-top: 20px;
    }

    .sunscription{
        padding: 20px 15px;
    }

    .btn-sponsor{
        border: 1px solid lightgray;
        padding: 6px 15px;
        border-radius: 25px;
        /* display: flex;
        flex-direction: column;
        text-align: center; */
    }
    
    #delete {
        display: inline;
    }

    .modify, .delete, .delete_form{
        display: inline;
    }

    .rooms_section{
        border-top: 1px solid lightgrey;
        border-bottom: 1px solid lightgrey;
        padding: 15px 0;
        margin: 20px 0;
    }

    .rooms_section div{
        width: 50%;
        display: flex;
        justify-content: space-between;
    }

    #gold{
        background-color: #D4AF37;
    }

    #silver{
        background-color: #C0C0C0;
    }

    #bronze{
        background-color: #CD7F32;
    }

    i{
        color: lightblue;
    }

    img{
        border-radius: 20px;
    }

    .description {
        border-bottom: 1px solid lightgrey;
        padding-bottom: 20px;
    }

</style>

{{-- </script> --}}
    {{-- function saveSponsor(locationId, sponsorId) {

        // Mando i dati nel controller per salvarli nel db
        axios.post('/api/sponsors/store', {
            location_id: locationId,
            sponsor_id: sponsorId
        });
    }; --}}

{{-- </script> --}}
