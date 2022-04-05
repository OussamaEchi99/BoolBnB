@extends('layouts.app')

@section('content')

    <section id="host-dashboard">
        <div class="container">
            {{-- Title --}}
            <h1>Benvenuto nella tua area personale</h1>
            {{-- Account Actions --}}
            <section class="dashboard-internal-section">
                

                
                @if (!$locations->isEmpty())

                <div class="row row-cols-1 row-cols-sm-1 row-cols-lg-2 row-cols-xl-2">
                    {{-- <div class="col my-3">
                        <a class="fast-actions-btn" href="{{ route('host.locations.index') }}">
                            <span id="home" class="fas fa-home"></span>Visualizza i tuoi annunci
                        </a>
                    </div> --}}
                    <div class="col my-3">
                        <a class="fast-actions-btn" href="{{ route('host.locations.create') }}">
                            <span id="home" class="fas fa-home"><i id="plus" class="fas fa-plus"></i></span>Aggiungi un annuncio
                        </a>
                    </div>
                    <div class="col my-3">
                        <a class="fast-actions-btn" href="{{ route('host.sponsors') }}">
                            <span class="fast-action-icon"><i class="fas fa-money-bill-wave"></i></span>Sponsorizza un annuncio
                        </a>
                    </div>
                    <div class="col my-3">
                        <a class="fast-actions-btn" href="{{ route('host.statistics') }}">
                            <span class="fast-action-icon"><i class="fas fa-chart-line"></i></span>Statistiche
                        </a>
                    </div>
                    <div class="col my-3">
                        <a class="fast-actions-btn" href="{{route('host.emails')}}">
                            <span class="fast-action-icon"><i class="fas fa-envelope"></i></span>Visualizza i messaggi
                        </a>
                    </div>
                </div>
                <h2 class="sub-title-dashboard">Le tue Location:</h2>
                <div class="row row-cols-3 row-cols-sm-1 row-cols-lg-3 row-cols-xl-4">
                    
                @foreach ($locations as $location)
                
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
                                <a href="{{ route('host.locations.show', ['location' => $location->id]) }}" class="btn btn-primary">Vai alla location</a>
                            </div>

                            {{-- @if ($payment)
                                {{-- {{ saveSponsor($location->id, sponsorId) }} --}}
                                {{-- <h1>pagamento avvenuto con successo!</h1> --}}
                            {{-- @endif --}}

                        </div>
                    </div>
               
                @endforeach

                @else
                    <div class="col my-3">
                        <a class="fast-actions-btn" href="{{ route('host.locations.create') }}">
                            <span id="home" class="fas fa-home"><i id="plus" class="fas fa-plus"></i></span> Diventa un Host
                        </a>
                    </div>
                @endif



                {{-- <div class="row row-cols-1 row-cols-sm-1 row-cols-lg-2 row-cols-xl-2">
                    <div class="col my-3">
                        <a class="fast-actions-btn" href="{{ route('host.locations.index') }}">
                            <span id="home" class="fas fa-home"></span>Visualizza i tuoi annunci
                        </a>
                    </div>
                    <div class="col my-3">
                        <a class="fast-actions-btn" href="{{ route('host.locations.create') }}">
                            <span id="home" class="fas fa-home"><i id="plus" class="fas fa-plus"></i></span>Aggiungi un annuncio
                        </a>
                    </div>
                    <div class="col my-3">
                        <a class="fast-actions-btn" href="{{ route('host.sponsors') }}">
                            <span class="fast-action-icon"><i class="fas fa-money-bill-wave"></i></span>Sponsorizza un annuncio
                        </a>
                    </div>
                    <div class="col my-3">
                        <a class="fast-actions-btn" href="{{ route('host.statistics') }}">
                            <span class="fast-action-icon"><i class="fas fa-chart-line"></i></span>Statistiche
                        </a>
                    </div>
                    <div class="col my-3">
                        <a class="fast-actions-btn" href="{{route('host.emails')}}">
                            <span class="fast-action-icon"><i class="fas fa-envelope"></i></span>Visualizza i messaggi
                        </a>
                    </div>
                </div> --}}

            </section>


        </div>
    </section>

@endsection

<style>
    #home{
        position: relative;

    }

    .row{
        justify-content: center;
    }

    #plus{
        font-size: 15px;
        position: absolute;
        left: 25px;
        bottom: 15px;
    }

    .fa-home{
        margin-right: 5px;
    }

    .sub-title-dashboard {
        margin-bottom: px;
        margin-top: 30px;
        font-size: 30px
    }
</style>
