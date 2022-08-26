@include('layouts.partials.header')
<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<!--<script src="{{asset('js/sweetalert2.min.js')}}"></script>-->
<!--<script src="{{asset('js/bootstrap.min.js')}}"></script>-->
<script src="{{asset('js/material.min.js')}}"></script>
<script src="{{asset('js/ripples.min.js')}}"></script>
<script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<body>
    @include('layouts.partials.navbar')
    <section class="full-box dashboard-contentPage">

        <nav class="full-box dashboard-Navbar">
            <ul class="full-box list-unstyled text-right">
                <li class="pull-left">
                    <a href="#!" class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
                </li>
                <li>
            </ul>
        </nav>

        <div class="container-fluid">
            <div class="page-header">
            <h1 class="text-titles">Sistema <small>Versión 2</small></h1>
            </div>
        </div>

            @yield('content')

    </section>
    @include('layouts.partials.footer')
</body>
</html>