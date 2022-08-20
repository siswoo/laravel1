@extends('layouts.main')
@section('content')
    <h1>Home</h1>
    @auth
        <p>Bienvenido usuario -> {{Auth::user()->nombre ?? Auth::user()->usuario}} Estas Logeado</p>
        <p><a href="{{route('logout.logout')}}">Cerrar Sesión</a></p>
    @endauth

    @guest
        <p>Para ver el contenido, <a href="/login">Inicia sesión</a></p>
    @endguest
@endsection
