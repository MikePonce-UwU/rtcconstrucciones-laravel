@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Mostrar alquiler') }}</h2>
                    </div>
                    <div class="col-auto">

                        <a href="{{ route('alquileres.index') }}" class="btn btn-primary" style="color:white">
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
                                            href="{{ route('alquileres.index') }}">{{ __('Entrega Alquileres') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __('Mostrar alquiler') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header text-center h1">Alquiler #{{ $alquiler->ID_ALQUILER }} de bodega
                                <label class="badge bg-success">{{ $alquiler->estado->NOMBRE }}</label>
                            </div>
                            <div class="card-body">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Nombre') }}:</strong>
                                        {{ $alquiler->NOMBRE_EMPRESA }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Direccion') }}:</strong>
                                        {{ $alquiler->DIRECCION }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Fecha de alquiler') }}:</strong>
                                        {{ $alquiler->FECHA_ALQUILER }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Total pago') }}:</strong>
                                        {{ $alquiler->TOTAL_PAGO }}
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
                                <div class="text-center h1">Lista de productos en alquiler</div>
                                <!-- Button trigger modal -->
                                @can('alquiler-create')
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modelId">
                                        NUEVO
                                    </button>
                                    @include('alquileres.detalle_alquileres.create')
                                @endcan

                                <table class="table table-striped text-center">
                                    <thead>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Cantidad</th>
                                        <th>Horas alquiler</th>
                                        <th>Horas atrasadas</th>
                                        <th>Pago por hora</th>
                                        <th>Pago excedido</th>
                                        <th>Subtotal</th>
                                        <th>Bodega</th>
                                        <th>Alquiler</th>
                                        <th>Opciones</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($alquiler->detalle_alquiler as $detalle)
                                            <tr>
                                                <td>{{ $detalle->ID_DETALLE_ALQUILER }}</td>
                                                <td>{{ $detalle->NOMBRE }}</td>
                                                <td>{{ $detalle->CANTIDAD }}</td>
                                                <td>{{ $detalle->HORAS_ALQUILER }}</td>
                                                <td>{{ $detalle->HORAS_EXCEDIDAS }}</td>
                                                <td>C${{ $detalle->PAGO_HORA }}</td>
                                                <td>C${{ $detalle->PAGO_EXCEDIDO }}</td>
                                                <td>C${{ $detalle->SUBTOTAL }}</td>
                                                <td>{{ $detalle->bodega_proyecto->NOMBRE_BODEGA }}</td>
                                                <td>{{ $detalle->alquiler->NOMBRE_EMPRESA }}</td>
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
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->

@endsection
