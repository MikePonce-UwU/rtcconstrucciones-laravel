@extends('layouts.app')
@section('titulo', 'Ver Proyecto')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Ver proyecto') }}</h2>
                    </div>
                    <div class="col-auto">

                        <a href="{{ route('proyectos.index') }}" class="btn btn-primary" style="color:white">
                            <span style="color:white"></span> {{ __('Volver') }}
                        </a>

                    </div>
                </div>
                <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('proyectos.index') }}">{{ __('Proyectos') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __('Ver Proyecto') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header text-center h1">
                                {{ $proyecto->NOMBRE }} 
                            <label class="badge bg-success">{{ $proyecto->estado->NOMBRE }}</label>
                            @if ($proyecto->FECHA_FINALIZACION < Carbon\Carbon::now() && $proyecto->estado->ID_ESTADO == 1)
                            <label class="badge bg-danger">{{ __('Retrasado') }}</label>
                            @endif
                            
                            </div>
                            <div class="card-body">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Fecha de Inicio') }}:</strong>
                                        {{ $proyecto->FECHA_INICIO->diffForHumans() }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Fecha de Finalización') }}:</strong>
                                        {{ $proyecto->FECHA_FINALIZACION->diffForHumans() }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Descripción') }}:</strong>
                                        {{ $proyecto->DESCRIPCION }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Dirección') }}:</strong>
                                        {{ $proyecto->DIRECCION }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Tipo de Obra') }}:</strong>
                                        {{ $proyecto->tipo_proyecto->NOMBRE }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow-lg mt-3">
                            <div class="card-header">
                                <div class="text-center h2">
                                    Bodega del Proyecto
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center align-content-center">
                                    <div class="col-12 col-md-10 col-sm-10 mb-3">
                                        <h5 class="card-title">Nombre de Bodega: </h5>
                                        <a href="{{ route('bodegas.show', $proyecto->bodega_proyecto->ID_BODEGA_PROYECTO) }}"
                                            class="card-link">{{ $proyecto->bodega_proyecto->NOMBRE_BODEGA }}
                                        </a>
                                    </div>
                                    <div class="col-12 col-md-10 col-sm-10 mb-3">
                                        <h5 class="card-title">Capacidad: </h5>
                                        <h6 class="card-text">{{ $proyecto->bodega_proyecto->CAPACIDAD }}
                                        </h6>
                                    </div>
                                    <div class="col-12 col-md-10 col-sm-10 mb-3">
                                        <h5 class="card-title">Responsable de Bodega: </h5>
                                        <h6 class="card-text">{{ $proyecto->bodega_proyecto->usuario->name }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .col-md-12 -->
                </div> <!-- end section row my-4 -->

            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->

@endsection
