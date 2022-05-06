@extends('layouts.app')
@section('titulo', 'Alquileres')
@section('content')   
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Administración de Alquileres') }}</h2>
                    </div>
                    <div class="col-auto">
                        @can('alquiler-create')
                            <a href="{{ route('alquileres.create') }}" class="btn btn-success" style="color:white">
                                <span style="color:white"></span> {{ __('Crear Nuevo Alquiler') }}
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
                                    <li class="breadcrumb-item active">{{ __('Alquileres') }}</li>
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
                                Listado de Alquileres
                            </div>
                            <div class="card-body">
                                <!-- table -->
                                <table class="table table-bordered mx-auto mx-md-0" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">{{ __('#') }}</th>
                                            <th class="text-center">{{ __('Nombre Empresa') }}</th>
                                            <th class="text-center">{{ __('Dirección') }}</th>
                                            <th class="text-center">{{ __('Fecha alquiler') }}</th>
                                            <th class="text-center">{{ __('Total') }}</th>
                                            <th class="text-center">{{ __('Acción') }}</th>
                                        </tr class="text-center">
                                    </thead>
                                    <tbody>
                                        @foreach ($alquileres as $alquiler)
                                            <tr>
                                                <td class="text-center">{{ $alquiler->ID_ALQUILER }}</td>
                                                <td class="text-center">{{ $alquiler->NOMBRE_EMPRESA }}</td>
                                                <td class="text-center">{{ $alquiler->DIRECCION }}</td>
                                                <td class="text-center">{{ $alquiler->FECHA_ALQUILER }}</td>
                                                <td class="text-center">C${{ $alquiler->TOTAL_PAGAR }}</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                        Acción
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        <a class="dropdown-item btn btn-secondary" href="{{ route('alquileres.show', $alquiler->ID_ALQUILER) }}">{{ __('Ver') }}</a>
                                                    <div class="dropdown-divider"></div>
                                                        @can('alquiler-edit')
                                                            <a class="dropdown-item btn btn-primary" href="{{ route('alquileres.edit', $alquiler->ID_ALQUILER) }}">{{ __('Editar') }}</a>
                                                        @endcan
                                                    <div class="dropdown-divider"></div>
                                                        @if (Route::has('alquileres.delete'))
                                                            <a href="{{ route('alquileres.delete', [$alquiler->ID_ALQUILER]) }}"
                                                                class="dropdown-item btn btn-warning">{{ __('Eliminar') }}</a>
                                                        @endif
                                                        @can('alquiler-delete')
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['alquileres.destroy', $alquiler->ID_ALQUILER], 'style' => 'display:inline']) !!}
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
            </div> <!-- end section row my-4 -->
        </div> <!-- .col-12 -->
    </div> <!-- .row -->
@endsection
