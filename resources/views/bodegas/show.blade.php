@extends('layouts.app')
@section('titulo', 'Ver Bodega')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Ver Bodega') }}</h2>
                    </div>
                    <div class="col-auto">

                        <a href="{{ route('bodegas.index') }}" class="btn btn-primary" style="color:white">
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
                                            href="{{ route('bodegas.index') }}">{{ __('Bodegas') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __('Ver Bodega') }}</li>
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
                                        <strong>{{ __('Encargado de bodega') }}:</strong>
                                        {{ $bodega->usuario->name }}
                                    </div>
                                </div>
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
                                        <a href="{{ route('proyectos.show', [$bodega->proyecto->ID_PROYECTO]) }}"
                                            class="btn btn-link"> <label class="badge bg-success">{{ $bodega->proyecto->NOMBRE }}</label></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .col-md-12 -->
                </div> <!-- end section row my-4 -->
                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="text-center h1">{{ __('Lista de Compras en Bodega') }}</div>
                                @foreach ($bodega->compra as $compra)
                                    <hr>
                                    <div class="row mx-auto">
                                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                                            <div class="card-title"><a
                                                    href="{{ route('compras.show', [$compra->ID_COMPRA]) }}"
                                                    class="btn btn-link">Compra #{{ $compra->ID_COMPRA }}</a></div>
                                            <p class="card-text fs-6">{{ $compra->DESCRIPCION }}</p>
                                            <p class="card-text fs-6">C${{ $compra->GASTO_TOTAL }}</p>
                                            <small
                                                class="fst-italic">{{ $compra->FECHA_COMPRA->diffForHumans() }}</small>
                                            <table class="table table-bordered mx-auto mx-md-0" id="dataTable-1">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">{{ __('#') }}</th>
                                                        <th class="text-center">{{ __('Nombre') }}</th>
                                                        <th class="text-center">{{ __('cantidad') }}</th>
                                                        <th class="text-center">{{ __('Precio') }}</th>
                                                        <th class="text-center">{{ __('Categoria') }}</th>
                                                    </tr class="text-center">
                                                </thead>
                                                <tbody>
                                                    @foreach ($compra->detalle_compra as $c)
                                                        <tr>
                                                            <td>{{ $c->ID_DETALLE_COMPRA }}</td>
                                                            <td>{{ $c->NOMBRE }}</td>
                                                            <td>{{ $c->CANTIDAD . $c->unidad_medida->ABREVIACION }}
                                                            </td>
                                                            <td>{{ __('C$') }}{{ $c->PRECIO }}</td>
                                                            <td><label
                                                                    class="badge bg-info">{{ $c->categoria->NOMBRE }}</label>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endforeach
                            </div>                            
                            <div class="card-body">
                                <div class="text-center h1">{{ __('Lista de Productos de Inventario') }}</div>
                                @foreach ($bodega->salida as $salida)
                                    <a href="{{ route('salidas.show', $salida->ID_SALIDA) }}"
                                        class="card-link mb-2">Salida #{{ $salida->ID_SALIDA }}</a>
                                        <br>
                                    <i
                                        class="text-muted text-xs">{{ Carbon\Carbon::createFromDate($salida->FECHA_SALIDA)->diffForHumans(now()) }}</i>
                                    <hr>
                                    <div class="row mx-auto">
                                        <div class="col-xs-12 col-sm-12 col-md-12 ">
                                            <table class="table table-bordered mx-auto mx-md-0" id="dataTable-2">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('#') }}</th>
                                                        <th>{{ __('Nombre') }}</th>
                                                        <th>{{ __('Cantidad') }}</th>
                                                        <th>{{ __('Estado') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($salida->detalle_salida as $detalle_salida)
                                                        <tr>
                                                            <td>{{ $detalle_salida->ID_SALIDA }}</td>
                                                            <td>{{ $detalle_salida->producto->NOMBRE }}</td>
                                                            <td>{{ $detalle_salida->CANTIDAD }}</td>
                                                            <td>{{ $detalle_salida->estado->NOMBRE }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div> <!-- .col-12 -->
                </div> <!-- .row -->
            </div> <!-- .container-fluid -->

            @endsection           
            @section('js-content')                
                <script>                 
                    $(document).ready(function() {
                        $('#dataTable-2')
                            .dataTable({
                                responsive: true,
                                dom: 'Bfrtip',
                                buttons: [
                                    'copy', 'csv', 'excel', 'pdf', 'print'
                                ]
                            });
                    });                   
                </script>
            @endsection
