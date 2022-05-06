@extends('layouts.app')
@section('titulo', 'Ver Compra')
@section('content')   
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10  col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Ver Compra') }}</h2>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('compras.index') }}" class="btn btn-primary" style="color:white">
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
                                            href="{{ route('compras.index') }}">{{ __('Compras') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __('Ver Compra') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header text-center h1">Compra #{{ $compra->ID_COMPRA }}
                                <label class="badge bg-success">{{ $compra->estado->NOMBRE }}</label>
                            </div>
                            <div class="card-body">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Descripción') }}:</strong>
                                        {{ $compra->DESCRIPCION }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Fecha de Compra') }}:</strong>
                                        {{ $compra->FECHA_COMPRA->diffForHumans() }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Gasto Total') }}:</strong>
                                        C${{ $compra->GASTO_TOTAL }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Bodega Proyecto') }}:</strong>
                                        <a href="{{ route('bodegas.show', [$compra->bodega_proyecto->ID_BODEGA_PROYECTO ]) }}"
                                            class="btn btn-link"> <label class="badge bg-success">{{ $compra->bodega_proyecto->NOMBRE_BODEGA }}</label></a>                                        
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="card-body">
                                <div class="row align-items-center my-3">
                                    <div class="col">
                                        <h3 class="card-title">Detalle de Compra</h3>
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#modelNuevoDetalle">
                                            Nuevo
                                        </button>
                                        @include('compras.detalle-compras.create')
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <table class="table table-bordered" id="dataTable-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">{{ __('#') }}</th>
                                                <th class="text-center">{{ __('Nombre') }}</th>
                                                <th class="text-center">{{ __('Cantidad') }}</th>
                                                <th class="text-center">{{ __('Precio') }}</th>
                                                <th class="text-center">{{ __('Categoria')}}</th>
                                                <th class="text-center">{{ __('Acción') }}</th>
                                            </tr class="text-center">
                                        </thead>
                                        <tbody>
                                            @forelse ($compra->detalle_compra as $detalle)
                                                <tr>
                                                    <td class="text-center">{{ $detalle->ID_DETALLE_COMPRA }}</td>
                                                    <td class="text-center">{{ $detalle->NOMBRE }}</td>
                                                    <td class="text-center">{{ $detalle->CANTIDAD }}</td>
                                                    <td class="text-center">{{ $detalle->PRECIO }}</td>
                                                    <td class="text-center">{{ $detalle->categoria->NOMBRE }}</td>
                                                    <td class="text-center">
                                                        @can('compra-delete')
                                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                                data-bs-target="#modelEliminarDetalle{{ $detalle->ID_DETALLE_COMPRA }}">
                                                                Eliminar
                                                            </button>
                                                        @endcan
                                                    </td>
                                                </tr>
                                                @include('compras.detalle-compras.delete')
                                            @empty
                                                <i class="fs-6 text-muted mx-auto">No hay datos que mostrar</i>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .col-md-12 -->
                </div> <!-- end section row my-4 -->
            </div>
        </div>
    </div>    
@endsection

