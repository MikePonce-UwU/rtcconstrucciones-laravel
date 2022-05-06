@extends('layouts.app')
@section('titulo', 'Productos')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Administración de Productos en Bodega Central') }}</h2>
                    </div>
                    <div class="col-auto">
                        @can('producto-create')
                            <a href="{{ route('productos.create') }}" class="btn btn-success" style="color:white">
                                <span style="color:white"></span> {{ __('Crear Nuevo Producto') }}
                            </a>
                            {{-- @include('users.modals-user.create') --}}
                        @endcan
                    </div>
                </div>
                <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __('Productos') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p>{{ $message }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header text-center h1">
                                Lista de Productos
                            </div>
                            <div class="card-body">
                                <!-- table -->
                                <table class="table table-bordered mx-auto mx-md-0" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">{{ __('#') }}</th>
                                            <th class="text-center">{{ __('Nombre') }}</th>
                                            <th class="text-center">{{ __('Cantidad') }}</th>
                                            <th class="text-center">{{ __('Estado') }}</th>
                                            <th class="text-center">{{ __('Acción') }}</th>
                                        </tr class="text-center">
                                    </thead>
                                    <tbody>
                                        @foreach ($productos as $producto)
                                            <tr>
                                                <td class="text-center">{{ $producto->ID_PRODUCTO }}</td>
                                                <td class="text-center">{{ $producto->NOMBRE }}</td>
                                                <td class="text-center">
                                                    {{ $producto->CANTIDAD }}{{ __(' ') }}{{ $producto->unidad_medida->ABREVIACION }}
                                                </td>
                                                <td class="text-center">{{ $producto->estado->NOMBRE }}</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                        Acción
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        <a class="dropdown-item btn btn-secondary" href="{{ route('productos.show', $producto->ID_PRODUCTO) }}">{{ __('Ver') }}</a>
                                                    <div class="dropdown-divider"></div>
                                                        @can('producto-edit')
                                                            <a class="dropdown-item btn btn-primary" href="{{ route('productos.edit', $producto->ID_PRODUCTO) }}">{{ __('Editar') }}</a>
                                                        @endcan
                                                    <div class="dropdown-divider"></div>
                                                        @if (Route::has('productos.delete'))
                                                            <a href="{{ route('productos.delete', [$producto->ID_PRODUCTO]) }}"
                                                                class="dropdown-item btn btn-warning">{{ __('Eliminar') }}</a>
                                                        @endif
                                                        @can('producto-delete')
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['productos.destroy', $producto->ID_PRODUCTO], 'style' => 'display:inline']) !!}
                                                            {!! Form::submit('Eliminar', ['class' => 'dropdown-item btn btn-danger']) !!}
                                                            {!! Form::close() !!}
                                                        @endcan
                                                    </div>    
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- end table -->
                            </div>
                        </div>
                    </div> <!-- .col-md-12 -->
                </div> <!-- end section row my-4 -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
@endsection
