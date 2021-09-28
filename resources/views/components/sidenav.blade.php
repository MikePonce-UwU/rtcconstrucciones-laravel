<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu" id="sb-scrolling-div">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link @if (Route::current()->getName() === 'home')
                active
            @endif "
                href="{{ route('home', []) }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Interfaces</div>
            @can('user-list')
                <a class="nav-link @if (Route::current()->getName() === 'users.index')
                active
            @endif "
                    href="{{ route('users.index', []) }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                    Usuarios
                </a>
            @endcan

            @can('role-list')
                <a class="nav-link @if (Route::current()->getName() === 'roles.index')
                active
            @endif "
                    href="{{ route('roles.index', []) }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-tag"></i></div>
                    Roles
                </a>
            @endcan

            @can('permission-list')
                <a class="nav-link @if (Route::current()->getName() === 'permisos.index')
                active
            @endif "
                    href="{{ route('permisos.index', []) }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-parking"></i></div>
                    Permisos
                </a>
            @endcan

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                aria-expanded="false" aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                Módulos
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse @if (Route::current()->getName() === 'bodegas.index' || Route::current()->getName() === 'proyectos.index')
                show
            @endif "
                id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    @can('bodega-list')
                        <a class="nav-link @if (Route::current()->getName() === 'bodegas.index')
                active
            @endif "
                            href="{{ route('bodegas.index', ['id' => 1]) }}">Bodegas</a>
                    @endcan

                    @can('proyecto-list')
                        <a class="nav-link @if (Route::current()->getName() === 'proyectos.index')
                    active
                @endif "
                            href="{{ route('proyectos.index', []) }}">Proyectos</a>
                    @endcan

                </nav>
            </div>
            <div class="sb-sidenav-menu-heading">Addons</div>
            <a class="nav-link @if (Route::current()->getName() === 'salidas.index')
                active
            @endif "
                href="#">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Solicitudes de salidas
            </a>
            <a class="nav-link @if (Route::current()->getName() === 'entradas.index')
                active
            @endif "
                href="#">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Solicitudes de entradas
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{ Auth::user()->name }}
    </div>
</nav>
@section('js-content')
    <script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script>
        $('#sb-scrolling-div').perfectScrollbar();
    </script>
@endsection
