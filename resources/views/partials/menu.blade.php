<!-- Sidebar de la pagina -->

<div class="side-header show">
    <button class="side-header-close"><i class="zmdi zmdi-close"></i></button>
    <!-- Side Header Inner Start -->
    <div class="side-header-inner custom-scroll">

        <nav class="side-header-menu" id="side-header-menu">
            <ul>
                <li><a href="{{ route('home')}}"><i class="ti-home"></i> <span>Dashboard</span></a></li>
                </li>
                <li class="has-sub-menu"><a href="#"><i class="ti-package"></i> <span>Modulo Usuarios</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a href="{{route('permisos.index')}}"><span>Gestionar Permisos</span></a></li>
                        <li><a href="{{route('roles.index')}}"><span>Gestionar Roles</span></a></li>
                        <li><a href="{{route('usuarios.index')}}"><span>Gestionar Usuarios</span></a></li>
                    </ul>
                </li>
                <li class="has-sub-menu"><a href="#"><i class="ti-package"></i> <span>Modulo Venta</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a href="{{ route('category.index') }}"><span>Gestionar Categorias</span></a></li>
                        <li><a href="{{ route('product.index') }}"><span>Gestionar Producto</span></a></li>
                        <li><a href="{{route('sale.index')}}"><span>Gestionar Ventas</span></a></li>
                        <li><a href="{{route('debtor.index')}}"><span>Gestionar Deudores</span></a></li>

                    </ul>
                </li>

            </ul>
            {{-- <ul>
                <li class="has-sub-menu"><a href="#"><i class="ti-stamp"></i> <span>Reportes y Estadisticas</span></a>
                    <ul class="side-header-sub-menu">
                        <li><a href="#"><span>Est. 0</span></a></li>
                        <li><a href="#"><span>Est. 1</span></a>
                        </li>
                        <li><a href="#"><span>Reportes</span></a></li>
                    </ul>
                </li>
            </ul> --}}
        </nav>

    </div>
</div>
