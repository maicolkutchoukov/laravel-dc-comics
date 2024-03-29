@extends('layouts.app')

@section('page-title', 'Home')

@section('main-content')
<main>
    <div class="container">

        <form action="{{ route('comics.update', ['comic' => $comic->id]) }}" method="POST">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            @csrf

            @method('PUT') {{-- Comunica al controller che gli stiamo passando un metodo PUT invece di POST --}}

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input value="{{ $comic->title }}" type="text" class="form-control  @error('title') is-invalid @enderror" id="title" name="title" placeholder="Insert title..." maxlength="256" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input value="{{ $comic->description }}" type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Insert description..." maxlength="1024">
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Thumb</label>
                <input value="{{ $comic->thumb }}" type="text" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb" placeholder="Insert thumb" maxlength="1024">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input value="{{ $comic->price }}" type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Insert price..." maxlength="32" required>
            </div>

            <div class="mb-3">
                <label for="series" class="form-label">Series</label>
                <input value="{{ $comic->series }}" type="text" class="form-control @error('series') is-invalid @enderror" id="series" name="series" placeholder="Insert series..." maxlength="256" required>
            </div>

            <div class="mb-3">
                <label for="sale_date" class="form-label">Sale date</label>
                <input value="{{ $comic->sale_date }}" type="text" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date" name="sale_date" placeholder="Insert sale date..." maxlength="16" required>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input value="{{ $comic->type }}" type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" placeholder="Insert type..." maxlength="64">
            </div>

            <div class="mb-3">
                <label for="artists" class="form-label">Artists</label>
                <input value="{{ $comic->artists }}" type="text" class="form-control @error('artists') is-invalid @enderror" id="artists" name="artists" placeholder="Insert artists..." maxlength="512">
            </div>

            <div class="mb-3">
                <label for="writers" class="form-label">Writers</label>
                <input value="{{ $comic->writers }}" type="text" class="form-control @error('writers') is-invalid @enderror" id="writers" name="writers" placeholder="Insert writes..." maxlength="512">
            </div>

            <div class="d-flex justify-content-center align-items-center mt-4">
                <button type="submit" class="btn btn-success w-25">
                    Aggiorna
                </button>
            </div>

        </form>
        <a href="{{route ('comics.index')}}" class="btn btn-primary mt-4">Home</a>
    </div>
</main>
@endsection
