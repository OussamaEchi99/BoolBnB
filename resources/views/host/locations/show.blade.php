@extends('layouts.dashboard')

@section('content')
    <section>
        <div class="container">
            <h1>{{ $location->name }}</h1>
            
            <div class="img-fluid">
                <img class="big_picture rounded mb-3" src="{{$location->photo}}" alt="{{$location->name}}">
            </div>

            <div class="mb-2"><strong>Categoria:</strong> {{ $location->category ? $location->category->name : 'nessuna' }}</div>

            <div class="mb-2"><strong>Features:</strong>
                @forelse ($location->features as $feature)
                    {{ $feature->name }}{{ $loop->last ? '' : ', ' }}
                @empty
                    nessuna
                @endforelse
            </div>

            @if ($location->photo)
            <div>
                <img src="{{ asset('storage/' . $location->photo) }}" alt="{{ $location->name }}">
            </div>
            @endif

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

            <div>
                <a href="{{ route('host.locations.edit', ['location' => $location->id]) }}">Modifica location</a>
            </div>

            <div class="mt-3">
                <form action="{{ route('host.locations.destroy', ['location' => $location->id]) }}" method="location">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger" onclick="return confirm('Sei sicuro di voler cancellare?')">Cancella</button>
                </form>
            </div>

            <div>
                <div class="map" id="map" ref="mapRef"></div>
            </div>
        </div>
    </section>
@endsection

<style>

    section{
        height: calc(100vh - 100px);
        overflow-y: auto;
    }
    h1{
        text-align: center;
    }

    .big_picture{
        height: 50vh;
        margin: auto;
        display: flex;
    }
</style>
