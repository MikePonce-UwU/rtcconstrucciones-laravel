@extends('layouts.app')
@section('titulo', 'Salidas')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Salidas') }}</h2>
                    </div>
                    <div class="col-auto">
                        @can('salida-create')
                            <a href="{{ route('salidas.create') }}" class="btn btn-success text-white">
                                <span></span> {{ __('Crear Nueva Salida') }}
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
                                    <li class="breadcrumb-item active">{{ __('Salidas') }}</li>
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
                                Listado de Salidas
                            </div>
                            <div class="card-body">
                                <!-- table -->
                                <table class="table table-bordered mx-auto mx-md-0" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">{{ __('#') }}</th>
                                            <th class="text-center">{{ __('Descripcion') }}</th>
                                            <th class="text-center">{{ __('Fecha salida') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr class="text-center">
                                    </thead>
                                    <tbody>
                                        @foreach ($salidas as $salida)
                                            <tr>
                                                <td class="text-center">{{ $salida->ID_SALIDA }}</td>
                                                <td class="text-center">{{ $salida->DESCRIPCION_SALIDA }}</td>
                                                <td class="text-center">
                                                    {{ \Carbon\Carbon::createFromDate($salida->FECHA_SALIDA)->diffForHumans() }}
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                        Acción
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        <a class="dropdown-item btn btn-secondary" href="{{ route('salidas.show', $salida->ID_SALIDA) }}">{{ __('Ver') }}</a>
                                                    <div class="dropdown-divider"></div>
                                                        @can('salida-edit')
                                                            <a class="dropdown-item btn btn-primary" href="{{ route('salidas.edit', $salida->ID_SALIDA) }}">{{ __('Editar') }}</a>
                                                        @endcan
                                                    <div class="dropdown-divider"></div>
                                                        @if (Route::has('salidas.delete'))
                                                            <a href="{{ route('salidas.delete', [$salida->ID_SALIDA]) }}"
                                                                class="dropdown-item btn btn-warning">{{ __('Eliminar') }}</a>
                                                        @endif
                                                        @can('salida-delete')
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['salidas.destroy', $salida->ID_SALIDA], 'style' => 'display:inline']) !!}
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
