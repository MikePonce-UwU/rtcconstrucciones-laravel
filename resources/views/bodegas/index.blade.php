@extends('layouts.app')
@section('titulo', 'Bodegas')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Bodegas') }}</h2>
                    </div>
                    <div class="col-auto">
                        @can('bodega-create')
                            <a href="{{ route('bodegas.create') }}" class="btn btn-success text-white">
                                <span></span> {{ __('Crear Nueva Bodega') }}
                            </a>
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
                                    <li class="breadcrumb-item active">{{ __('Bodegas') }}</li>
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
                                Listado de Bodegas
                            </div>
                            <div class="card-body">
                                <!-- table -->
                                <table class="table table-bordered mx-auto mx-md-0" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">{{ __('#') }}</th>
                                            <th class="text-center">{{ __('Nombre bodega') }}</th>
                                            <th class="text-center">{{ __('Dirección') }}</th>
                                            <th class="text-center">{{ __('Encargado') }}</th>
                                            <th class="text-center">{{ __('Fecha creación') }}</th>
                                            <th class="text-center">{{ __('Fecha cierre') }}</th>
                                            <th class="text-center">{{ __('Capacidad') }}</th>
                                            <th class="text-center">{{ __('Acción') }}</th>
                                        </tr class="text-center">
                                    </thead>
                                    <tbody>
                                        @foreach ($bodegas as $bodega)
                                            <tr>
                                                <td class="text-center">{{ $bodega->ID_BODEGA_PROYECTO }}</td>
                                                <td class="text-center">{{ $bodega->NOMBRE_BODEGA }}</td>
                                                <td class="text-center">{{ $bodega->DIRECCION }}</td>
                                                <td class="text-center">
                                                    @if ($bodega->usuario->name === Auth::user()->name) {{ 'Tú' }} @else {{ $bodega->usuario->name }} @endif
                                                </td>
                                                <td class="text-center">{{ $bodega->FECHA_CREACION }}</td>
                                                <td class="text-center">{{ $bodega->FECHA_CIERRE }}</td>
                                                <td class="text-center">{{ $bodega->CAPACIDAD }}</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                        Acción
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        <a class="dropdown-item btn btn-secondary" href="{{ route('bodegas.show', $bodega->ID_BODEGA_PROYECTO) }}">{{ __('Ver') }}</a>
                                                    <div class="dropdown-divider"></div>
                                                        @can('bodega-edit')
                                                            <a class="dropdown-item btn btn-primary" href="{{ route('bodegas.edit', $bodega->ID_BODEGA_PROYECTO) }}">{{ __('Editar') }}</a>
                                                        @endcan
                                                    <div class="dropdown-divider"></div>
                                                        @if (Route::has('bodegas.delete'))
                                                            <a href="{{ route('bodegas.delete', [$bodega->ID_BODEGA_PROYECTO]) }}"
                                                                class="dropdown-item btn btn-warning">{{ __('Eliminar') }}</a>
                                                        @endif
                                                        @can('bodega-delete')
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['bodegas.destroy', $bodega->ID_BODEGA_PROYECTO], 'style' => 'display:inline']) !!}
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
