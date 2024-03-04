@extends('layouts.app')

@section('page-title', 'Home')

@section('main-content')
<main>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('comics.store') }}" method="POST">
        
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title *</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Insert title..." maxlength="256" value="{{ old('title') }}">
                @error('title')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
               @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Insert description..." maxlength="2048" value="{{ old('description') }}">
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Thumb</label>
                <input type="text" class="form-control @error('thumb') is-invalid @enderror" id="thumb" name="thumb" placeholder="Insert thumb" maxlength="1024" value="{{ old('thumb') }}">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price *</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Insert price..." maxlength="8" value="{{ old('price') }}" required>
            </div>

            <div class="mb-3">
                <label for="series" class="form-label">Series *</label>
                <input type="text" class="form-control @error('series') is-invalid @enderror" id="series" name="series" placeholder="Insert series..." maxlength="256" value="{{ old('series') }}" required>
            </div>

            <div class="mb-3">
                <label for="sale_date" class="form-label">Sale date *</label>
                <input type="text" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date" name="sale_date" placeholder="Insert date AAAA-MM-GG format..." maxlength="16" value="{{ old('sale_date') }}" required>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" placeholder="Insert type..." maxlength="64" value="{{ old('type') }}">
            </div>

            <div class="mb-3">
                <label for="artists" class="form-label">Artists</label>
                <input type="text" class="form-control @error('artists') is-invalid @enderror" id="artists" name="artists" placeholder="Insert artists..." maxlength="512" value="{{ old('artist') }}">
            </div>

            <div class="mb-3">
                <label for="writers" class="form-label">Writers</label>
                <input type="text" class="form-control @error('writers') is-invalid @enderror" id="writers" name="writers" placeholder="Insert writes..." maxlength="512" value="{{ old('writers') }}">
            </div>

            <div class="d-flex justify-content-center align-items-center mt-4">
                <button type="submit" class="btn btn-success w-25">
                    ADD
                </button>
            </div>

        </form>
        <a href="{{route ('comics.index')}}" class="btn btn-primary mt-4">Home</a>
    </div>
</main>
@endsection
