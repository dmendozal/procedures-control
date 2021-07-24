<!-- Sidebar de la pagina -->

<div class="side-header show">
    <button class="side-header-close"><i class="zmdi zmdi-close"></i></button>
    <!-- Side Header Inner Start -->
    <div class="side-header-inner custom-scroll">

        <nav class="side-header-menu" id="side-header-menu">
            <ul>
                <li><a href="{{ route('home')}}"><i class="ti-home"></i> <span>Inicio</span></a></li>
                </li>
                @if(Auth::User()->id==1)
                <li class="has-sub-menu"><a href="#"><i class="ti-package"></i> <span>Modulo Usuarios</span></a>
                    <ul class="side-header-sub-menu">
                         <!--
                            <li><a href="{{route('permisos.index')}}"><span>Gestionar Permisos</span></a></li>
                            <li><a href="{{route('roles.index')}}"><span>Gestionar Roles</span></a></li>
                        -->
                        <li><a href="{{route('usuarios.index')}}"><span>Gestionar Usuarios</span></a></li>
                    </ul>
                </li>
                @endif
                
                <li class="has-sub-menu"><a href="#"><i class="ti-package"></i> <span>Modulo Tramites</span></a>
                    <ul class="side-header-sub-menu">
                        @if(Auth::User()->id==1)
                            <li><a href="{{ route('carrera.index')}}"><span>Gestionar Carreras</span></a></li>
                            <li><a href="{{ route('tipo_tramites.index')}}"><span>Gestionar Tipo de Tramites</span></a></li>
                            <li><a href="{{ route('tecnico.index')}}"><span>Gestionar Tecnicos</span></a></li>
                        @endif
                        <li><a href="{{ route('estudiante.index')}}"><span>Gestionar Estudiantes</span></a></li>
                        <li><a href="{{ route('tramite.index')}}"><span>Gestionar Tramites</span></a></li>
                    </ul>
                </li>

            </ul>
           
        </nav>

    </div>
</div>
