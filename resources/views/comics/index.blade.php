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
                                <a href="{{route ('comics.show', ['comic' => $comic->id])}}" class="btn btn-primary position-absolute">SHOW</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
