@extends('layouts.app')

@section('content')
    <section>
        <div class="container">

            <h2>Crea una nuova Location</h2>

            {{-- Validation Errors Message  --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('host.locations.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')

                {{-- Location Name --}}
                <div class="mb-3">
                    <label for="name" class="form-label">Nome della location:</label>
                    <input type="text" required minlength="3" maxlength="50" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>


                {{-- Country --}}
                <div class="mb-3">
                    <label for="country" class="form-label">Nazione:</label>
                    <input type="text" required minlength="3" maxlength="100" class="form-control" id="contry" name="country" value="{{ old('country') }}">
                </div>

                {{-- city --}}
                <div class="mb-3">
                    <label for="city" class="form-label">Città:</label>
                    <input type="text" required minlength="2" maxlength="100" class="form-control" id="city" name="city" value="{{ old('city') }}">
                </div>

                {{-- address --}}
                <div class="mb-3">
                    <label for="address" class="form-label">Indirizzo:</label>
                    <input type="text" required minlength="2" maxlength="255" class="form-control" id="address" name="address" value="{{ old('address') }}">
                </div>

                 {{-- number --}}
                 <div class="mb-3">
                    <label for="number" class="form-label">Numero civico:</label>
                    <input type="text" required min="1" max="15000" class="form-control" id="number" name="number" value="{{ old('number') }}">
                </div>

                {{-- Visible --}}
                <div class="mb-3">
                    <label for="visible" class="form-label">Visible:</label>
                    <input type="number" required class="form-control" id="visible" name="visible" value="{{ old('visible') }}">
                </div>

                {{-- <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="visible">
                    <label class="custom-control-label" for="visible" name="visible" value="1">Toggle this switch element</label>
                </div> --}}

                {{-- Rooms Number --}}
                <div class="mb-3">
                    <label for="rooms" class="form-label">N. Stanze:</label>
                    <input type="number" required min="1" max="127" class="form-control" id="rooms" name="rooms" value="{{ old('rooms') }}">
                </div>

                {{-- Beds Number --}}
                <div class="mb-3">
                    <label for="beds" class="form-label">N. Letti:</label>
                    <input type="number" required min="1" max="127" class="form-control" id="beds" name="beds" value="{{ old('beds') }}">
                </div>

                {{-- Bathrooms Number --}}
                <div class="mb-3">
                    <label for="bathrooms" class="form-label">N. Bagni:</label>
                    <input type="number" required min="1" max="127" class="form-control" id="bathrooms" name="bathrooms" value="{{ old('bathrooms') }}">
                </div>

                {{-- Square Meters --}}
                <div class="mb-3">
                    <label for="price" class="form-label">Metri Quadri:</label>
                    <input type="number" required min="1" max="30000" class="form-control" id="square_meters" name="square_meters" value="{{ old('square_meters') }}">
                </div>

                {{-- Price --}}
                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo:</label>
                    <input type="number" required min="0" class="form-control" id="price" name="price" value="{{ old('price') }}">
                </div>

                {{-- Category --}}
                <div class="mb-3">
                    <label for="category_id" class="form-label">Categoria:</label>
                    <div>
                        <select class="form-select" name="category_id" id="category_id">
                            <option value="">Nessuna</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Services --}}
                <div class="mb-3">
                    <span>Servizi:</span>
                    @foreach ($features as $feature)
                        <div class="form-check">
                            <input class="form-check-input" name="features[]" type="checkbox" value="{{ $feature->id }}" id="feature-{{ $feature->id }}">
                            <label class="form-check-label" for="feature-{{ $feature->id }}">
                                {{ $feature->name }}
                            </label>
                        </div>
                    @endforeach
                </div>

                {{-- Location Photo --}}
                <div class="mb-3">
                    <label for="photo" class="form-label">Immagine:</label>
                    <div>
                        <input type="file" required id="photo" name="photo">
                    </div>
                </div>

                {{-- Description --}}
                <div id="description" class="mb-3">
                    <label for="description" class="form-label">Descrizione:</label>
                    <textarea class="form-control" maxlength="60000" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                </div>

                {{-- LAT --}}
                <div class="mb-3">
                    <input readonly type="number" class="form-control d-none" id="lat" name="lat" value="{{ old('lat') }}">
                </div>

                {{-- LONG --}}
                <div class="mb-3">
                    <input readonly type="number" class="form-control d-none" id="long" name="long" value="{{ old('long') }}">
                </div>

                {{-- Create Button --}}
                <button id="send" style="display: none" type="submit" class="btn btn-primary">Crea</button>

            </form>
            <button onclick="getApi()" class="btn btn-primary">Crea</button>
        </div>
    </section>
@endsection
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
    let latitudine = 0;
    let longitudine = 0;
    let Ukey = 'R6KZnN9ipu52EGyKlInZsrp7MMTUJZP2';
    let UcountryCode = 'IT';

    function getApi() {
        let city = document.getElementById("city").value;
        let address = document.getElementById("address").value;
        let number = document.getElementById("number").value;


            axios.get('https://api.tomtom.com/search/2/structuredGeocode.json', {
                params: {
                    key: Ukey,
                    countryCode: UcountryCode,
                    municipality: city,
                    streetName: address,
                    streetNumber: number
                }
            })
            .then((response) => {
                latitudine = response.data.results[0].position.lat;
                longitudine = response.data.results[0].position.lon;
                document.getElementById("lat").value = latitudine;
                document.getElementById("long").value = longitudine;
                createButton();
            });
    };

    function createButton(){
        document.getElementById("send").click();
    };

</script>
