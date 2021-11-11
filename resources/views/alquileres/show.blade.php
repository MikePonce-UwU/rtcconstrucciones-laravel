@extends('layouts.app')
@section('content')
    <x-contentHeader header="{{ __('Mostrar alquiler') }}">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a>
        </li>
        <li class="breadcrumb-item"><a href="{{ route('alquileres.index') }}">{{ __('Entrega Alquileres') }}</a>
        </li>
        <li class="breadcrumb-item active">{{ __('Mostrar alquiler') }}</li>
    </x-contentHeader>
    <x-content>
        <a href="{{ route('alquileres.index') }}" class="btn btn-primary" style="color:white">
            <span style="color:white"></span> {{ __('Back') }}
        </a>
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
                                C${{ $alquiler->TOTAL_PAGAR }}
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- .col-md-12 -->
        </div> <!-- end section row my-4 -->
        <div class="row my-4">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header text-center h1">Lista de productos en alquiler</div>
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        @can('alquiler-create')
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modelId">
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
    </x-content>

@endsection
