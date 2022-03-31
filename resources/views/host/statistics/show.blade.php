@extends('layouts.app')

@section('content')
    <section id="visuals-page">
        <div class="container">

            {{-- Title --}}
            <h1 class="titolo">Le statistiche della tua location | {{ $location->name }}</h1>

            <div class="visuals-card-container">

                {{-- Total Visuals --}}
                <div class="visuals-card">
                    <div>Visualizzazioni totali</div>
                    <div class="visuals-number">{{ $visuals->count() }}</div>
                </div>

                {{-- Today Visuals --}}
                <div class="visuals-card">
                    <div>Visualizzazioni oggi</div>
                    <div class="visuals-number">{{ $todayVisuals->count() }}</div>
                </div>
            </div>

        </div>
    </section>
@endsection
