@include('layouts.partials.header')
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