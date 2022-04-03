@extends('layouts.app')

@section('content')

    <section id="host-dashboard">
        <div class="container">
            {{-- Title --}}
            <h1>Benvenuto nell'area riservata all'Host</h1>
            {{-- Account Actions --}}
            <section class="dashboard-internal-section">
                <h3>Il tuo account</h3>

                <div class="row row-cols-1 row-cols-sm-1 row-cols-lg-2 row-cols-xl-2">
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
                </div>
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
</style>
