@extends('layouts.app')

@section('content')
    <h1>Locations</h1>
    @foreach ($locations as $location)
        <div>
            <a href="{{ route('host.location_emails', ['location' => $location->id]) }}" class="btn btn-primary">{{$location->name}}</a>
        </div>
    @endforeach
@endsection