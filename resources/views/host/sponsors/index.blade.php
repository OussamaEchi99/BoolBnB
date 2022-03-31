@extends('layouts.app')

@section('content')
    <section id="sponsor">
        <div class="container">
            <h1>Sponsorizza i tuoi appartamenti</h1>
            @if (!$locations->isEmpty())
                @foreach ($locations as $location)
                    <div class="row location">
                        <div class="col-6">
                            <a class="location-name" href="#">{{ $location->name }}</a>
                        </div>
        
                        <div class="col-6 d-flex">
                            @foreach ($sponsors as $sponsor)
                                <div class="mx-4">
                                    {{-- <a id="sponsor" class="subscription" href="#">{{ $sponsor->subscription }}</a> --}}
                                    <button type="button" class="subscription" onclick="saveSponsor({{ $location->id }}, {{ $sponsor->id }})">{{ $sponsor->subscription }}</button>
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

{{-- SCRIPT --}}
<script>

    function saveSponsor(locationId, sponsorId) {

        // Mando i dati nel controller per salvarli nel db
        axios.post('/api/sponsors/store', {
            location_id: locationId,
            sponsor_id: sponsorId
        });
    };
    
</script>