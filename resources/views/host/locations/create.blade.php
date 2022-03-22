@extends('layouts.dashboard')

@section('content')
    <section>
        <div class="container">
            Sezione Create
            <h2>Crea un nuovo post</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('host.locations.store') }}" method="post">
                @csrf
                @method('POST')

                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $location->name) }}">
                </div>
        
                {{-- <div class="mb-3">
                    <label for="rooms" class="form-label">Stanze</label>
                    <input type="number" class="form-control" id="rooms" name="rooms" value="{{ old('rooms', $location->rooms) }}">
                </div>
        
                <div class="mb-3">
                    <label for="beds" class="form-label">Letti</label>
                    <input type="number" class="form-control" id="beds" name="beds" value="{{ old('beds', $location->beds) }}">
                </div>
        
                <div class="mb-3">
                    <label for="bathrooms" class="form-label">Bagni</label>
                    <input type="number" class="form-control" id="bathrooms" name="bathrooms" value="{{ old('bathrooms', $location->bathrooms) }}">
                </div>
        
                <div class="mb-3">
                    <label for="price" class="form-label">Metri Quadrati</label>
                    <input type="number" class="form-control" id="square_meters" name="square_meters" value="{{ old('square_meters', $location->square_meters) }}">
                </div>
        
                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $location->price) }}">
                </div>
        
                <div class="mb-3">
                    <label for="category_id" class="form-label">Categoria</label>
                    <select class="form-select" name="category_id" id="category_id">
                        <option value="">Nessuna</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $location->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div> --}}

                {{-- <div class="mb-3">
                    <h4>Tags</h4>

                    @foreach ($tags as $tag)
                        <div class="form-check">
                            <input {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }} class="form-check-input" name="tags[]" type="checkbox" value="{{ $tag->id }}" id="tag-{{ $tag->id }}">
                            <label class="form-check-label" for="tag-{{ $tag->id }}">
                                {{ $tag->name }}
                            </label>
                        </div>
                    @endforeach
                </div> --}}

                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ old('content') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>
@endsection