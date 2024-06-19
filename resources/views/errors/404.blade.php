
@extends('layouts.app')

@section('title', 'Página no encontrada')

@section('content')
    <div class="container">
        <h1>Página no encontrada</h1>
        <p>Lo sentimos, pero la página que estás buscando no existe.</p>
        <a href="{{ url('/') }}">Volver a la página principal</a>
    </div>
@endsection
