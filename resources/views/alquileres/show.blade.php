@extends('layouts.app')
@section('titulo', 'Ver Alquiler')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Ver alquiler') }}</h2>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('alquileres.index') }}" class="btn btn-primary" style="color:white">
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
                                            href="{{ route('alquileres.index') }}">{{ __('Alquileres') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __('Ver Alquiler') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header text-center h1">Alquiler #{{ $alquiler->ID_ALQUILER }} de Bodega
                                <label class="badge bg-success">{{ $alquiler->estado->NOMBRE }}</label>
                            </div>
                            <div class="card-body">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Nombre Empresa') }}:</strong>
                                        {{ $alquiler->NOMBRE_EMPRESA }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Dirección') }}:</strong>
                                        {{ $alquiler->DIRECCION }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Fecha de Alquiler') }}:</strong>
                                        {{ $alquiler->FECHA_ALQUILER }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Total a Pagar') }}:</strong>
                                        C${{ $alquiler->TOTAL_PAGAR }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Bodega Proyecto') }}:</strong>
                                        @foreach ($alquiler->detalle_alquiler as $det)
                                        <?php 
                                        $id_bod = $det->bodega_proyecto->ID_BODEGA_PROYECTO;
                                        $nom_bod = $det->bodega_proyecto->NOMBRE_BODEGA; ?>
                                        @endforeach
                                        <a href="{{ route('bodegas.show', [$id_bod]) }}"
                                            class="btn btn-link"> <label class="badge bg-success">{{ $nom_bod }}</label></a>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .col-md-12 -->
                </div> <!-- end section row my-4 -->
                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header text-center h1">Lista de Productos en Alquiler</div>
                            <div class="card-body">
                                <!-- Button trigger modal -->
                                @can('alquiler-create')
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modelId">
                                        NUEVO
                                    </button>
                                    @include('alquileres.detalle_alquileres.create')
                                @endcan
                                <br><br><br>
                                <table class="table table-bordered mx-auto mx-md-0" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th>Alquilado Por</th>
                                            <th>Atrasado Por</th>
                                            <th>Pago por Alquiler</th>
                                            <th>Pago por Atraso</th>
                                            <th>S.total</th>                                                                                    
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($alquiler->detalle_alquiler as $detalle)
                                            <tr>
                                                <td>{{ $detalle->ID_DETALLE_ALQUILER }}</td>
                                                <td>{{ $detalle->NOMBRE }}</td>
                                                <td>{{ $detalle->CANTIDAD }} U</td>
                                                <td>{{ $detalle->HORAS_ALQUILER }} Hrs</td>
                                                <td>{{ $detalle->HORAS_EXCEDIDAS }} Hrs</td>
                                                <td>C${{ $detalle->PAGO_HORA }}</td>
                                                <td>C${{ $detalle->PAGO_EXCEDIDO }}</td>
                                                <td>C${{ $detalle->SUBTOTAL }}</td>                                                
                                                <td>
                                                    @can('alquiler-delete')
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['detalle-alquileres.destroy', $detalle->ID_DETALLE_ALQUILER], 'style' => 'display:inline']) !!}
                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger mb-2 mb-md-0']) !!}
                                                        {!! Form::close() !!}
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
