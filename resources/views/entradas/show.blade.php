@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Mostrar entrada') }}</h2>
                    </div>
                    <div class="col-auto">

                        <a href="{{ route('entradas.index') }}" class="btn btn-primary" style="color:white">
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
                                            href="{{ route('entradas.index') }}">{{ __('Entradas') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __('Mostrar entrada') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header text-center h1">Entrada #{{ $entrada->ID_ENTRADA }}</div>
                            <div class="card-body">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Usuario de la entrada') }}:</strong>
                                        {{ $usuario->name }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Descripcion') }}:</strong>
                                        {{ $entrada->DESCRIPCION_ENTRADA }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Fecha de compra') }}:</strong>
                                        {{ $entrada->FECHA_ENTRADA }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Bodega a la que pertenece') }}:</strong>
                                        <span class="badge bg-success">
                                            {{ $bodega->NOMBRE_BODEGA }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row align-items-center my-3">
                                    <div class="col">
                                        <h3 class="card-title">Detalle de entrada</h3>
                                    </div>
                                    <div class="col-auto">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#modelNuevoDetalle">
                                            Nuevo detalle
                                        </button>
                                        @include('entradas.detalle-entradas.create')
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <table class="table table-bordered mx-auto" id="dataTable-1">
                                        <thead>
                                            <th class="text-center">ID de detalle</th>
                                            <th class="text-center">Producto</th>
                                            <th class="text-center">Cantidad</th>
                                            <th class="text-center">Estado</th>
                                            <th class="text-center">Acciones</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($detalles as $detalle)
                                                <tr id="row_{{ $detalle->ID_DETALLE_ENTRADA }}">
                                                    <td class="text-center">{{ $detalle->ID_DETALLE_ENTRADA }}</td>
                                                    <td class="text-center">
                                                        @foreach ($producto as $p)
                                                            @if ($detalle->ID_PRODUCTO === $p->ID_PRODUCTO)
                                                                {{ $p->NOMBRE }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td class="text-center">{{ $detalle->CANTIDAD }}</td>
                                                    <td class="text-center">{{ $detalle->ESTADO_DESC }}</td>
                                                    <td class="text-center">
                                                        @can('entrada-delete')
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                                data-bs-target="#modelEliminarDetalle{{ $detalle->ID_DETALLE_ENTRADA }}">
                                                                Delete
                                                            </button>
                                                        @endcan
                                                    </td>
                                                </tr>
                                                @include('entradas.detalle-entradas.delete')
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
@section('css-content')
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
@endsection
@section('js-content')
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable-1')
                .dataTable({
                    responsive: true,
                });
        });
    </script>
@endsection
