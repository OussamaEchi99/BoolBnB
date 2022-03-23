@extends('layouts.dashboard')

@section('content')
    <section>
        <h2>Modifica Annuncio</h2>

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

        <form action="{{ route('host.locations.update', ['location' => $location->id] ) }}" method="post">
            @csrf
            @method('PUT')

            {{-- Location Name --}}
            <div class="mb-3">
              <label for="name" class="form-label">Nome</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $location->name) }}">
            </div>

            {{-- Visible --}}
            <div class="mb-3">
                <label for="visible" class="form-label">Visible</label>
                <input type="number" class="form-control" id="visible" name="visible" value="{{ old('visible', $location->visible) }}">
            </div>

            {{-- Rooms Number --}}
            <div class="mb-3">
                <label for="rooms" class="form-label">Stanze</label>
                <input type="number" class="form-control" id="rooms" name="rooms" value="{{ old('rooms', $location->rooms) }}">
            </div>

            {{-- Beds Number --}}
            <div class="mb-3">
                <label for="beds" class="form-label">Letti</label>
                <input type="number" class="form-control" id="beds" name="beds" value="{{ old('beds', $location->beds) }}">
            </div>

            {{-- Bathrooms Number --}}
            <div class="mb-3">
                <label for="bathrooms" class="form-label">Bagni</label>
                <input type="number" class="form-control" id="bathrooms" name="bathrooms" value="{{ old('bathrooms', $location->bathrooms) }}">
            </div>

            {{-- Square Meters --}}
            <div class="mb-3">
                <label for="square_meters" class="form-label">Metri Quadrati</label>
                <input type="number" class="form-control" id="square_meters" name="square_meters" value="{{ old('square_meters', $location->square_meters) }}">
            </div>

            {{-- Price --}}
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $location->price) }}">
            </div>

            {{-- Category --}}
            <div class="mb-3">
                <label for="category_id" class="form-label">
                    <span>Categoria</span>
                </label>
                <div>
                    <select class="form-select" name="category_id" id="category_id">
                        <option value="">Nessuna</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category', $location->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Services --}}
            <div class="mb-3">
                <span>Servizi</span>

                @foreach ($features as $feature)
                    <div class="form-check">
                        @if ($errors->any())
                            <input {{ in_array($feature->id, old('features', [])) ? 'checked' : '' }} class="form-check-input" type="checkbox" name="features[]" value="{{ $feature->id }}" id="feature-{{ $feature->id }}">
                        @else
                            <input {{ $location->features->contains($feature) ? 'checked' : '' }} class="form-check-input" type="checkbox" name="features[]" value="{{ $feature->id }}" id="feature-{{ $feature->id }}">
                        @endif

                        <label class="form-check-label" for="feature-{{ $feature->id }}">
                        {{ $feature->name }}
                        </label>
                    </div>
                @endforeach
            </div>

            {{-- Location Photo --}}
            <div class="mb-3">
                <label for="photo" class="form-label">Cover</label>
                <div>
                    <input type="file" id="photo" name="photo">
                </div>

                <div>
                    immagine precedente:
                </div>
            </div>

            {{-- Description --}}
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description', $location->description) }}</textarea>
            </div>

            {{-- Edit Button --}}
            <button type="submit" class="btn btn-primary">Modifica</button>

          </form>
    </section>
@endsection