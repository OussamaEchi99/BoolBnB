@extends('layouts.dashboard')

@section('content')
<div class="container">
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
                    <a href="{{ route('host.locations.show', ['location' => $location->id]) }}" class="btn btn-primary">Vai alla casa</a>
                    </div>
                </div>
            </div>
            {{-- End Single location --}}
        @endforeach
    </div>
</div>
@endsection
