@extends('layouts.app')

@section('content')
    <section>
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
