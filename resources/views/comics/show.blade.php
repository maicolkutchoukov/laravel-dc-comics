@extends('layouts.app')

@section('page-title', 'Home')

@section('main-content')
    <main>
        <div class="container">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-md-2">
                        <img src="{{$comic->thumb}}" class="w-100 rounded-start" alt="...">
                    </div>
                    <div class="col-md-10">
                        <div class="card-body">
                            <h5 class="card-title">{{$comic->title}}</h5>
                            <p class="card-text mb-1">{{$comic->description}}</p>
                            <p class="card-text mb-1"><strong>Price: </strong> {{$comic->price}}</p>
                            <p class="card-text mb-1"><strong>Series: </strong> {{$comic->series}}</p>
                            <p class="card-text mb-1"><strong>Release Date: </strong>{{$comic->sale_date}}</p>
                            <p class="card-text mb-1"><strong>Type: </strong>{{$comic->type}}</p>
                            <p class="card-text mb-1"><strong>Artists: </strong>{{$comic->artists}}</p>
                            <p class="card-text mb-1"><strong>Writers: </strong>{{$comic->writers}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

