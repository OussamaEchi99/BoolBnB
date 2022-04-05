@extends('layouts.app')

@section('content')
    <section>
        <div class="container">

            <h1>Statistiche delle tue location</h1>

            @if (!$locations->isEmpty())
                <div class="row row-cols-10">
                    @foreach ($locations as $location)

                        {{-- Single location --}}
                        <div class="col">
                            <a class="location" href="{{ route('host.apartment_statistics', ['location' => $location->id]) }}" class="card mt-2">

                                <div class="image">
                                    @if (str_contains($location->photo, 'location_photos'))
                                        <img src="{{ asset('storage/' . $location->photo) }}" class="img-fluid img" alt="{{ $location->name }}">
                                    @else
                                        <img src="{{ $location->photo }}" class="img-fluid img" alt="{{ $location->name }}">
                                    @endif
                                </div>

                                <div>
                                    <h5 class="card-title">{{ $location->name }}</h5>
                                    <p class="card-text">{{ Str::substr($location->description, 0, 70) }}...</p>
                
                                    <li class="btn btn-danger scritta">
                                        <span>Visualizza le statistiche</span>
                                        <i class="fas fa-sign-in-alt"></i>
                                    </li>
                                </div>
                            </a>
                        </div>

                    @endforeach

                </div>
            @else
                <span>Non hai ancora nessun annuncio</span>
            @endif

        </div>
    </section>
@endsection

<style>
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
    margin: 35px 40px;
    display: none !important;
    transition: display 0.5s;
}

.location:hover .scritta{
    display: inline-block !important;
}
</style>