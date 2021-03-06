@extends('layouts.app')
@section('titulo', 'Ver Salida')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Ver Salida') }}</h2>
                    </div>
                    <div class="col-auto">

                        <a href="{{ route('salidas.index') }}" class="btn btn-primary" style="color:white">
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
                                            href="{{ route('salidas.index') }}">{{ __('Salidas') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __('Ver salida') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header text-center h1">Salida #{{ $salida->ID_SALIDA }}</div>
                            <div class="card-body">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Usuario de la Salida') }}:</strong>
                                        {{ $salida->usuario->name }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Descripci??n') }}:</strong>
                                        {{ $salida->DESCRIPCION_SALIDA }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Fecha de Compra') }}:</strong>
                                        {{ \Carbon\Carbon::createFromDate($salida->FECHA_SALIDA)->diffForHumans() }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Bodega a la que Pertenece') }}:</strong>
                                        <a href="{{ route('bodegas.show', [$salida->bodega_proyecto->ID_BODEGA_PROYECTO ]) }}"
                                            class="btn btn-link"> <label class="badge bg-success">{{ $salida->bodega_proyecto->NOMBRE_BODEGA }}</label></a>                                         
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row align-items-center my-3">
                                    <div class="col">
                                        <h3 class="card-title">Detalle de Salida</h3>
                                    </div>
                                    <div class="col-auto">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#modelNuevoDetalle">
                                            Nuevo
                                        </button>
                                        @include('salidas.detalle-salidas.create')
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <table class="table table-bordered mx-auto" id="dataTable-1">
                                        <thead>
                                            <th class="text-center">{{ __('#') }}</th>
                                            <th class="text-center">{{ __('Producto') }}</th>
                                            <th class="text-center">{{ __('Cantidad') }}</th>
                                            <th class="text-center">{{ __('Estado') }}</th>
                                            <th class="text-center">{{ __('Acci??n') }}</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($salida->detalle_salida as $detalle_salida)
                                                <tr id="row_{{ $detalle_salida->ID_DETALLE_SALIDA }}">
                                                    <td class="text-center">{{ $detalle_salida->ID_DETALLE_SALIDA }}
                                                    </td>
                                                    <td class="text-center">{{ $detalle_salida->producto->NOMBRE }}
                                                    </td>
                                                    <td class="text-center">{{ $detalle_salida->CANTIDAD }}</td>
                                                    <td class="text-center">{{ $detalle_salida->estado->NOMBRE }}</td>
                                                    <td class="text-center">
                                                        @can('salida-delete')
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                                data-bs-target="#modelEliminarDetalle{{ $detalle_salida->ID_DETALLE_SALIDA }}">
                                                                Eliminar
                                                            </button>
                                                        @endcan
                                                    </td>
                                                </tr>
                                                @include('salidas.detalle-salidas.delete')
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .col-md-12 -->
                </div> <!-- end section row my-4 -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->

@endsection
