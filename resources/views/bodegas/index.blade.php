@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Bodegas') }}</h2>
                    </div>
                    <div class="col-auto">
                        @can('bodega-create')
                            <a href="{{ route('bodegas.create') }}" class="btn btn-success text-white">
                                <span></span> {{ __('New') }}
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __('Bodegas') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p>{{ $message }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header text-center h1">
                                Listado de bodegas disponibles
                            </div>
                            <div class="card-body">
                                <!-- table -->
                                <table class="table table-bordered mx-auto mx-md-0" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">{{ __('Nombre bodega') }}</th>
                                            <th class="text-center">{{ __('Dirección') }}</th>
                                            <th class="text-center">{{ __('Encargado') }}</th>
                                            <th class="text-center">{{ __('Fecha creación') }}</th>
                                            <th class="text-center">{{ __('Fecha cierre') }}</th>
                                            <th class="text-center">{{ __('Capacidad') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr class="text-center">
                                    </thead>
                                    <tbody>
                                        @foreach ($bodegas as $bodega)
                                            <tr>
                                                <td class="text-center">{{ $bodega->NOMBRE_BODEGA }}</td>
                                                <td class="text-center">{{ $bodega->DIRECCION }}</td>
                                                <td class="text-center">
                                                    @if ($bodega->usuario->name === Auth::user()->name) {{ 'Tú' }} @else {{ $bodega->usuario->name }} @endif
                                                </td>
                                                <td class="text-center">{{ $bodega->FECHA_CREACION }}</td>
                                                <td class="text-center">{{ $bodega->FECHA_CIERRE }}</td>
                                                <td class="text-center">{{ $bodega->CAPACIDAD }}</td>
                                                <td class="text-center">
                                                    <a class="btn btn-secondary mb-2 mb-md-0"
                                                        href="{{ route('bodegas.show', $bodega->ID_BODEGA_PROYECTO) }}">{{ __('Show') }}</a>
                                                    @can('bodega-edit')
                                                        <a class="btn btn-primary mb-2 mb-md-0"
                                                            href="{{ route('bodegas.edit', $bodega->ID_BODEGA_PROYECTO) }}">{{ __('Edit') }}</a>
                                                    @endcan
                                                    @if (Route::has('bodegas.delete'))
                                                        <a href="{{ route('bodegas.delete', [$bodega->ID_BODEGA_PROYECTO]) }}"
                                                            class="btn btn-warning">{{ __('Eliminar') }}</a>
                                                    @endif
                                                    @can('bodega-delete')
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['bodegas.destroy', $bodega->ID_BODEGA_PROYECTO], 'style' => 'display:inline']) !!}
                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger mb-2 mb-md-0']) !!}
                                                        {!! Form::close() !!}
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- end table -->
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
