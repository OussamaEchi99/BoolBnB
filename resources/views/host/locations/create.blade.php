@extends('layouts.dashboard')

@section('content')
    <section>
        <div class="container">
            Sezione Create
            <h2>Crea un nuovo post</h2>

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
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>

                {{-- LAT --}}
                <div class="mb-3">
                    <label for="lat" class="form-label">--Latitude--</label>
                    <input type="number" class="form-control" id="lat" name="lat" value="{{ old('lat') }}">
                </div>

                {{-- LONG --}}
                <div class="mb-3">
                    <label for="long" class="form-label">--Longitude--</label>
                    <input type="number" class="form-control" id="long" name="long" value="{{ old('long') }}">
                </div>

                {{-- Visible --}}
                <div class="mb-3">
                    <label for="visible" class="form-label">Visible</label>
                    <input type="number" class="form-control" id="visible" name="visible" value="{{ old('visible') }}">
                </div>

                {{-- Rooms Number --}}
                <div class="mb-3">
                    <label for="rooms" class="form-label">Stanze</label>
                    <input type="number" class="form-control" id="rooms" name="rooms" value="{{ old('rooms') }}">
                </div>
        
                {{-- Beds Number --}}
                <div class="mb-3">
                    <label for="beds" class="form-label">Letti</label>
                    <input type="number" class="form-control" id="beds" name="beds" value="{{ old('beds') }}">
                </div>
        
                {{-- Bathrooms Number --}}
                <div class="mb-3">
                    <label for="bathrooms" class="form-label">Bagni</label>
                    <input type="number" class="form-control" id="bathrooms" name="bathrooms" value="{{ old('bathrooms') }}">
                </div>
        
                {{-- Square Meters --}}
                <div class="mb-3">
                    <label for="price" class="form-label">Metri Quadrati</label>
                    <input type="number" class="form-control" id="square_meters" name="square_meters" value="{{ old('square_meters') }}">
                </div>
        
                {{-- Price --}}
                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}">
                </div>
        
                {{-- Category --}}
                <div class="mb-3">
                    <label for="category_id" class="form-label">Categoria</label>
                    <select class="form-select" name="category_id" id="category_id">
                        <option value="">Nessuna</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Services --}}
                <div class="mb-3">
                    <h4>Servizi</h4>
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
                    <label for="photo" class="form-label">Cover</label>
                    <input class="form-control" type="file" id="photo" name="photo">
                </div>

                {{-- Description --}}
                <div class="mb-3">
                    <label for="description" class="form-label">description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                </div>

                {{-- Create Button --}}
                <button type="submit" class="btn btn-primary">Crea</button>

            </form>
        </div>
    </section>
@endsection