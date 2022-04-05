@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Messaggi ricevuti per le tue location</h1>
        @if (!$locations->isEmpty())
        {{-- <ul class="list-group">
            @foreach ($locations as $location)
                <li class="list_element my-4">
                    <a href="{{ route('host.location_emails', ['location' => $location->id]) }}">
                        <span>{{$location->name}}</span>
                    </a>
                </li>
            @endforeach
        </ul> --}}

        <ul class="list-group">
            @foreach ($locations as $location)

            
                <a class="location" href="{{ route('host.location_emails', ['location' => $location->id]) }}">

                    <div class="image">
                        @if (str_contains($location->photo, 'location_photos'))
                            <img src="{{ asset('storage/' . $location->photo) }}" class="img-fluid img" alt="{{ $location->name }}">
                        @else
                            <img src="{{ $location->photo }}" class="img-fluid img" alt="{{ $location->name }}">
                        @endif
                    </div>

                    <div>
                        <li class="info">
                            {{$location->name}}
                        </li>
    
                        <li class="btn btn-danger scritta">
                            <span>Visualizza Messaggi</span>
                            <i class="fas fa-sign-in-alt"></i>
                        </li>
                    </div>
                </a>
            
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

.scritta {
    margin: 65px 40px;
    display: none !important;
    transition: display 0.5s;
}

.location:hover .scritta{
    display: inline-block !important;
}
</style>
