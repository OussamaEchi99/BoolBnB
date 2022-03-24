@extends('layouts.dashboard')

@section('content')
    <section>
        <div class="container">

            {{-- {{dd($todayVisuals->count())}} --}}

            <h1 class="titolo">Le statistiche del tuo appartamento | {{ $location->name }}</h1>

            <div class="visual-card-container">

                <div class="visual-card">
                    <div>Visualizzazioni totali</div>
                    <div class="visuals-number">{{ $visuals->count() }}</div>
                </div>

                <div class="visual-card">
                    <div>Visualizzazioni oggi</div>
                    <div class="visuals-number">{{ $todayVisuals->count() }}</div>
                </div>
            </div>

        </div>
    </section>
@endsection

<style>

.titolo {
    margin-bottom: 30px;
}

.visual-card-container {
    display: flex;
}
    
.visual-card {
    width: 20vw;
    min-height: 5vw;
    margin-right: 20px;
    padding: 20px 22px;
    /* background-color: rgb(238, 238, 238); */
    /* border: 1px solid black; */
    border-radius: 10px;
    font-size: 16px;
    box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
}

.visuals-number {
    font-size: 50px;
}

</style>