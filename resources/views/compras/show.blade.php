@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Mostrar compra') }}</h2>
                    </div>
                    <div class="col-auto">

                        <a href="{{ route('compras.index') }}" class="btn btn-primary" style="color:white">
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
                                            href="{{ route('compras.index') }}">{{ __('Compras') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __('Mostrar Compras') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header text-center h1">Compra #{{ $compra->ID_COMPRA }}</div>
                            <div class="card-body">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Descripcion') }}:</strong>
                                        {{ $compra->DESCRIPCION }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Fecha de compra') }}:</strong>
                                        {{ $compra->FECHA_COMPRA }}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{ __('Gasto total') }}:</strong>
                                        C${{ $compra->GASTO_TOTAL }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row align-items-center my-3">
                                    <div class="col">
                                        <h3 class="card-title">Detalle de compra</h3>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{ route('detalle-compras.create', $compra->ID_COMPRA) }}"
                                            class="btn btn-success">
                                            <span style="color:white"></span> {{ __('Nuevo registro') }}
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <table class="table table-bordered mx-auto" id="dataTable-1">
                                        <thead>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Cantidad</th>
                                            <th class="text-center">Precio</th>
                                            <th class="text-center">Categoria</th>
                                            <th class="text-center">Acciones</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($detalles as $detalle)
                                                <tr>
                                                    <td class="text-center">{{ $detalle->ID_DETALLE_COMPRA }}</td>
                                                    <td class="text-center">{{ $detalle->NOMBRE }}</td>
                                                    <td class="text-center">{{ $detalle->CANTIDAD }}</td>
                                                    <td class="text-center">{{ $detalle->PRECIO }}</td>
                                                    <td class="text-center">{{ $detalle->ID_CATEGORIA }}</td>
                                                    <td class="text-center">
                                                        @can('compra-delete')
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['detalle-compras.destroy', $detalle->ID_DETALLE_COMPRA], 'style' => 'display:inline']) !!}
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
                .addClass('nowrap')
                .dataTable({
                    responsive: true,
                    columnDefs: [{
                        targets: [0, 1, 5],
                        className: 'dt-body-right'
                    }]
                });
        });
    </script>
@endsection
