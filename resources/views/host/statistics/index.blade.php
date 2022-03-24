@extends('layouts.app')

@section('content')
    <section>
        <div class="container">

            <h1>Statistiche dei tuoi appartamenti</h1>

            <div class="row row-cols-3">
                @foreach ($locations as $location)

                    {{-- Single location --}}
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
                            <a href="{{ route('host.apartment_statistics', ['location' => $location->id]) }}" class="btn btn-primary">Visualizza le statistiche</a>
                            </div>
                        </div>
                    </div>
                    
                @endforeach

            </div>
        </div>
    </section>
@endsection