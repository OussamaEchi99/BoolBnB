@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Messaggi ricevuti per le tue location</h1>
        @if (!$locations->isEmpty())
        <ul class="list-group">
            @foreach ($locations as $location)
                <li class="list_element my-4">
                    <a href="{{ route('host.location_emails', ['location' => $location->id]) }}">
                        <span>{{$location->name}}</span>
                    </a>
                </li>
            @endforeach
        </ul>
        @else
            <div>Non hai ancora inserito delle location</div>
        @endif
    </div>
@endsection

<style>
    ul{
        list-style: none;
    }

    .list_element{
        padding: 10px 20px;
        width: 20%;
        border-radius: 50px;
    }
</style>
