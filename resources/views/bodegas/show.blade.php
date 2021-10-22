@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Mostrar Bodega') }}</h2>
                    </div>
                    <div class="col-auto">

                        <a href="{{ route('bodegas.index') }}" class="btn btn-primary" style="color:white">
                            <span style="color:white"></span> {{ __('Back') }}
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
                                            href="{{ route('bodegas.index') }}">{{ __('Bodegas') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __('Mostrar Bodega') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header text-center h1">{{ $bodega->NOMBRE_BODEGA }}</div>
                            <div class="card-body">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Direccion') }}:</strong>
                                        {{ $bodega->DIRECCION }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Fecha de creacion') }}:</strong>
                                        {{ $bodega->FECHA_CREACION->diffForHumans() }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Fecha de cierre') }}:</strong>
                                        {{ $bodega->FECHA_CIERRE->diffForHumans() }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Capacidad') }}:</strong>
                                        {{ $bodega->CAPACIDAD }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Capacidad') }}:</strong>
                                        {{ $bodega->CAPACIDAD_DISPONIBLE }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Proyecto al que pertenece') }}:</strong>
                                        <label class="badge bg-success">{{ $bodega->proyecto->NOMBRE }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .col-md-12 -->
                </div> <!-- end section row my-4 -->
                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header text-center h1">{{ __('Lista de productos en bodega') }}</div>
                            <div class="card-body">
                                <div class="col-xs-10 col-sm-10 col-md-10">
                                    <table class="table table-bordered" id="dataTable-1">
                                        <thead>
                                            <th>Nombre</th>
                                            <th>cantidad</th>
                                            <th>Estado</th>
                                        </thead>
                                        <tbody>
                                            @forelse ($bodega->compra as $compra)
                                                @forelse ($compra->detalle_compra as $c)
                                                    {{ dd($c) }}
                                                    <tr>
                                                        <td>{{ $c->NOMBRE }}</td>
                                                        <td>{{ $c->CANTIDAD }}</td>
                                                        <td><label
                                                                class="badge bg-info">{{ $c->categoria->NOMBRE }}</label>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <i class="fs-6 text-muted">No hay datos que mostrar</i>
                                                @endforelse
                                            @empty
                                                <i class="fs-6 text-muted">No hay datos que mostrar</i>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->

@endsection
