<section class="full-box cover dashboard-sideBar">
    <div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
    <div class="full-box dashboard-sideBar-ct">
        <div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
            CamaleonMG <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
        </div>
        <div class="full-box dashboard-sideBar-UserInfo">
            <figure class="full-box">
                <img src="{{asset('img/avatar.jpg')}}" alt="UserIcon">
                <figcaption class="text-center text-titles" style="text-transform: capitalize; font-size: 18px; font-weight:bold;">{{Auth::user()->nombre ." ". Auth::user()->apellido }}</figcaption>
            </figure>
            <ul class="full-box list-unstyled text-center">
                <li>
                    <p><a style="color: white; font-size:14px; text-decoration: none;"href="{{route('logout.logout')}}">Configuración</a></p>
                    <p><a style="color: white; font-size:14px; text-decoration: none;"href="{{route('logout.logout')}}">Cerrar Sesión</a></p>
                </li>
            </ul>
        </div>
        <ul class="list-unstyled full-box dashboard-sideBar-Menu">
            <li>
                <a href="home.html">
                    <i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Inicio
                </a>
            </li>
            <li>
                <a href="#!" class="btn-sideBar-SubMenu">
                    <i class="zmdi zmdi-case zmdi-hc-fw"></i> Administrador <i class="zmdi zmdi-caret-down pull-right"></i>
                </a>
                <ul class="list-unstyled full-box">
                    <li>
                        <a href="#"><i class="zmdi zmdi-timer zmdi-hc-fw"></i> Usuarios</a>
                    </li>
                    <li>
                        <a href="#"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Roles</a>
                    </li>
                    <li>
                        <a href="#"><i class="zmdi zmdi-graduation-cap zmdi-hc-fw"></i> Módulos</a>
                    </li>
                    <li>
                        <a href="#"><i class="zmdi zmdi-font zmdi-hc-fw"></i> Modelos</a>
                    </li>
                    <li>
                        <a href="#"><i class="zmdi zmdi-font zmdi-hc-fw"></i> Pasantes</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</section>