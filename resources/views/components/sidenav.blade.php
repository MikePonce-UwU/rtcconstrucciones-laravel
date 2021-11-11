{{-- sidebar nuevo xd --}}
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('agency-assets/casco.png') }}" alt="RTConstrucciones Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <x-heading-span class="brand-text font-weight-light">{{ config('app.name') }}</x-heading-span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('adminlte-assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link @if (Route::current()->getName() === 'home') active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-header">GESTIÓN DE ACTIVOS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Usuarios y roles
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('roles.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Roles</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('permisos.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Permisos</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">GESTIÓN DE PROYECTOS</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Bodegas
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('bodegas.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listar bodegas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('bodegas.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Crear bodega</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Proyectos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('proyectos.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listar proyectos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('proyectos.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Crear proyecto</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Alquileres<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('alquileres.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listar alquileres</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('alquileres.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Crear alquiler</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('compras.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Compras<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('compras.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listar compras</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('compras.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Crear compra</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">GESTIÓN DE PRODUCTOS</li>
                <li class="nav-item">
                    <a href="{{ route('productos.index') }}" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Productos
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Entradas
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('entradas.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listar entradas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('entradas.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Crear entrada</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Salidas
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('salidas.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listar salidas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('salidas.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Crear salida</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
