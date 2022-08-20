@extends('layouts.main')
@section('content')

    <section class="full-box dashboard-contentPage">

        <nav class="full-box dashboard-Navbar">
            <ul class="full-box list-unstyled text-right">
                <li class="pull-left">
                    <a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
                </li>
                <li>
                    <a href="#!" class="btn-modal-help">
                        <i class="zmdi zmdi-help-outline"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <div class="container-fluid">
            <div class="page-header">
            <h1 class="text-titles">Sistema <small>Inicio</small></h1>
            </div>
        </div>

        <div class="full-box text-center" style="padding: 30px 10px;">
            <article class="full-box tile">
                <div class="full-box tile-title text-center text-titles text-uppercase">
                    Administradores
                </div>
                <div class="full-box tile-icon text-center">
                    <i class="zmdi zmdi-account"></i>
                </div>
                <div class="full-box tile-number text-titles">
                    <p class="full-box">1</p>
                    <small>Registrados</small>
                </div>
            </article>
            <article class="full-box tile">
                <div class="full-box tile-title text-center text-titles text-uppercase">
                    Pasantes
                </div>
                <div class="full-box tile-icon text-center">
                    <i class="zmdi zmdi-male-alt"></i>
                </div>
                <div class="full-box tile-number text-titles">
                    <p class="full-box">100</p>
                    <small>Registrados</small>
                </div>
            </article>
            <article class="full-box tile">
                <div class="full-box tile-title text-center text-titles text-uppercase">
                    Modelos
                </div>
                <div class="full-box tile-icon text-center">
                    <i class="zmdi zmdi-face"></i>
                </div>
                <div class="full-box tile-number text-titles">
                    <p class="full-box">70</p>
                    <small>Registrados</small>
                </div>
            </article>
            <article class="full-box tile">
                <div class="full-box tile-title text-center text-titles text-uppercase">
                    Nóminas
                </div>
                <div class="full-box tile-icon text-center">
                    <i class="zmdi zmdi-male-female"></i>
                </div>
                <div class="full-box tile-number text-titles">
                    <p class="full-box">70</p>
                    <small>Registrados</small>
                </div>
            </article>
        </div>
    </section>

@endsection
