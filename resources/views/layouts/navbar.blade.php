<nav class="navbar navbar-expand-lg bg-white fixed-top">
    <div class="container-fluid">
        <!--LOGO DEL SITIO-->
        <a class="navbar-brand" href="{{route('mascotas.index')}}">
            <img src="https://aux.iconspalace.com/uploads/cat-walk-icon-256.png" width=30>
        </a>
        
        <!--BOTONES DE NAVEGACIÓN-->
        <div class="d-flex align-items-center">
            <ul class="navbar-nav">

                <!--BANDEJA DE SOLICITUDES-->
                @auth
                <li class="nav-item active mx-1">
                    <a class="btn btn-primary" href="{{route('solicitudes.index')}}">Solicitudes</a>
                </li>

                <!--CERRAR SESIÓN-->
                <li class="nav-item active mx-1">
                    <!--LÓGICA DE BREEZE:-->
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="nav-link btn btn-success" id="logout">Cerrar sesión</button>
                    </form>
                </li>
                @endauth
                
                <!--INGRESAR-->
                @guest
                <li class="nav-item active mx-1">
                    <a class="nav-link btn btn-success" href="{{route('login')}}">Ingresar</a>
                </li>
                @endguest
                
            </ul>
        </div>
    </div>

</nav>