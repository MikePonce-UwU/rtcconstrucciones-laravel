@extends('layouts.app')
@section('titulo', 'Entradas')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Administración de Entradas') }}</h2>
                    </div>
                    <div class="col-auto">
                        @can('entrada-create')
                            <a href="{{ route('entradas.create') }}" class="btn btn-success text-white">
                                <span></span> {{ __('Crear Nueva Entrada') }}
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
                                    <li class="breadcrumb-item active">{{ __('Entradas') }}</li>
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
                                Listado de Entradas
                            </div>
                            <div class="card-body">
                                <!-- table -->
                                <table class="table table-bordered mx-auto mx-md-0" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">{{ __('#') }}</th>
                                            <th class="text-center">{{ __('Descripcion') }}</th>
                                            <th class="text-center">{{ __('Fecha entrada') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr class="text-center">
                                    </thead>
                                    <tbody>
                                        @foreach ($entradas as $entrada)
                                            <tr>
                                                <td class="text-center">{{ $entrada->ID_ENTRADA }}</td>
                                                <td class="text-center">{{ $entrada->DESCRIPCION_ENTRADA }}</td>
                                                <td class="text-center">{{ $entrada->FECHA_ENTRADA }}</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                        Acción
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        <a class="dropdown-item btn btn-secondary" href="{{ route('entradas.show', $entrada->ID_ENTRADA) }}">{{ __('Ver') }}</a>
                                                    <div class="dropdown-divider"></div>
                                                        @can('entrada-edit')
                                                            <a class="dropdown-item btn btn-primary" href="{{ route('entradas.edit', $entrada->ID_ENTRADA) }}">{{ __('Editar') }}</a>
                                                        @endcan
                                                    <div class="dropdown-divider"></div>
                                                        @if (Route::has('entradas.delete'))
                                                            <a href="{{ route('entradas.delete', [$entrada->ID_ENTRADA]) }}"
                                                                class="dropdown-item btn btn-warning">{{ __('Eliminar') }}</a>
                                                        @endif
                                                        @can('entrada-delete')
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['entradas.destroy', $entrada->ID_ENTRADA], 'style' => 'display:inline']) !!}
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
