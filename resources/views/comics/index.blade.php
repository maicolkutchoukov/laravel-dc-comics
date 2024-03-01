@extends('layouts.app')

@section('page-title', 'Home')

@section('main-content')
    <main>
        <div class="container">
            
            <div class="row">
                @foreach ($comics as $index => $comic)
                    <div class="col-4 pb-3 mb-5">
                        <div class="card h-100 pb-5">
                            <img src="{{$comic->thumb}}" class="card-img-top" alt="...">
                            <div class="card-body position-relative">
                                <h5 class="card-title">{{$comic->title}}</h5>
                                <p class="card-text card-description">{{$comic->description}}</p>
                                <p class="card-text">{{$comic->price}}</p>
                                <p class="card-text">{{$comic->series}}</p>
                                <p class="card-text">{{$comic->sale_date}}</p>
                                <p class="card-text">{{$comic->type}}</p>
                                <p class="card-text card-artist">Artists: {{$comic->artists}}</p>
                                <p class="card-text card-writers">Writers: {{$comic->writers}}</p>
                                <div class="position-absolute">
                                    <a href="{{route ('comics.show', ['comic' => $comic->id])}}" class="btn btn-primary">SHOW</a>
                                    <a href="{{ route('comics.edit', ['comic' => $comic->id]) }}" class="btn btn-warning">
                                        Modifica
                                    </a>
                                    <form
                                        onsubmit="return confirm('Sei sicuro di voler eliminare questa comic?');"
                                        class="d-inline-block"
                                        action="{{ route('comics.destroy', ['comic' => $comic->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            Elimina
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a href="{{route('comics.create')}}" class="btn btn-primary px-4 py-3 mb-5">ADD NEW COMIC, CLICK HERE!</a>
        </div>
    </main>
@endsection
