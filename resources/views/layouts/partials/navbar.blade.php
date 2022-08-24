<section class="full-box cover dashboard-sideBar">
    <div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
    <div class="full-box dashboard-sideBar-ct">
        <div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title" style="height: 100px;">
            <img src="{{asset('img/logo2.gif')}}" class="img-fluid" style="width: 200px;" alt=""> <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
        </div>
        <div class="full-box dashboard-sideBar-UserInfo">
            <figure class="full-box">
                @if(Auth::user()->avatar=='')
                    <img src="{{asset('img/avatar.jpg'.date('now'))}}" alt="UserIcon" class="img-fluid">
                @else
                <img src="{{asset('img/avatar1.png?'.date('now'))}}" alt="UserIcon" class="img-fluid">
                @endif
                <figcaption class="text-center text-titles" style="text-transform: capitalize; font-size: 18px; font-weight:bold;">
                    {{Auth::user()->nombre ." ". Auth::user()->apellido }}
                </figcaption>
            </figure>
            <ul class="full-box list-unstyled text-center">
                <li>
                    <p><a style="color: white; font-size:14px; text-decoration: none;" href="#">Configuración</a></p>
                    <p><a style="color: white; font-size:14px; text-decoration: none;" href="#" onclick="cerrarSession1();">Cerrar Sesión</a></p>
                </li>
            </ul>
        </div>
        <ul class="list-unstyled full-box dashboard-sideBar-Menu">
            <li>
                <a href="{{route('lobby.index')}}">
                    <i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Inicio
                </a>
            </li>
            <li>
                <a href="#!" class="btn-sideBar-SubMenu">
                    <i class="zmdi zmdi-case zmdi-hc-fw"></i> Administrador <i class="zmdi zmdi-caret-down pull-right"></i>
                </a>
                {{ dd($usuarios->id); }}
                <!--
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
                -->
            </li>
        </ul>
    </div>
</section>