@extends('layouts.app')

@section('page-title', 'Home')

@section('main-content')

<h2>
    Ciao {{ $firstName }} {{ $lastName }}
</h2>
@endsection
