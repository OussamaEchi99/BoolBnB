@extends('layouts.app')

@section('content')
    <section id="sponsor">
        <div class="container">
            <h1 class="mb-5">Sponsorizza le tue location</h1>
            @if (!$locations->isEmpty())
                @foreach ($locations as $location)
                    <div class="row location">
                        <div class="col-6 d-flex align-items-center">
                            <a class="location-name text-uppercase" href="{{ route('host.locations.show', ['location' => $location->id]) }}">{{ $location->name }}</a>
                        </div>

                        <div class="col-6 d-flex">
                            @foreach ($sponsors as $sponsor)
                                <div class="mx-4">
                                    <a class="subscription" href="{{route('host.credit-card',['sponsor' => $sponsor->id , 'location' => $location->id])}}">{{ $sponsor->subscription }}</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @else
                <span>Non hai ancora nessun annuncio</span>
            @endif

        </div>
    </section>
@endsection
