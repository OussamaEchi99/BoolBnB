@extends('layouts.app')

@section('content')
    <section id="visuals-page">
        <div class="container">

            {{-- Title --}}
            <h1 class="titolo">Le statistiche della tua location | {{ $location->name }}</h1>

            <div class="visuals-card-container">

                <div>
                    {{-- Total Visuals --}}
                    <div class="visuals-card">
                        <div>Visualizzazioni totali</div>
                        <div class="visuals-number">{{ $visuals->count() }}</div>
                    </div>

                    {{-- Year Visuals --}}
                    <div class="visuals-card">
                        <div>Visualizzazioni ultimo anno</div>
                        <div class="visuals-number">{{ $yearVisuals->count() }}</div>
                    </div>

                    {{-- Month Visuals --}}
                    <div class="visuals-card">
                        <div>Visualizzazioni ultimo mese</div>
                        <div class="visuals-number">{{ $monthVisuals->count() }}</div>
                    </div>

                    {{-- Daily Visuals --}}
                     <div class="visuals-card">
                        <div>Visualizzazioni ultimo giorno</div>
                        <div class="visuals-number">{{ $todayVisuals->count() }}</div>
                    </div>
                </div>

                <div>
                    {{-- Total mails --}}
                     <div class="visuals-card">
                        <div>Emails totali</div>
                        <div class="visuals-number">{{ $emails->count() }}</div>
                    </div>

                    {{-- Year mails --}}
                    <div class="visuals-card">
                        <div>Emails ultimo anno</div>
                        <div class="visuals-number">{{ $yearEmails->count() }}</div>
                    </div>

                    {{-- Month mails --}}
                    <div class="visuals-card">
                        <div>Emails ultimo mese</div>
                        <div class="visuals-number">{{ $monthEmails->count() }}</div>
                    </div>

                    {{-- Daily mails --}}
                    <div class="visuals-card">
                        <div>Emails ultimo giorno</div>
                        <div class="visuals-number">{{ $todayEmails->count() }}</div>
                    </div>
                </div>
               
            </div>

        </div>
    </section>
@endsection

<style>
</style>