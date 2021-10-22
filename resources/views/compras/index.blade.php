@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Compras') }}</h2>
                    </div>
                    <div class="col-auto">
                        @can('compra-create')
                            <a href="{{ route('compras.create') }}" class="btn btn-success text-white">
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
                                    <li class="breadcrumb-item active">{{ __('Compras') }}</li>
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
                                Listado de compras
                            </div>
                            <div class="card-body">
                                <!-- table -->
                                <table class="table table-bordered mx-auto mx-md-0" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">{{ __('Descripcion') }}</th>
                                            <th class="text-center">{{ __('Fecha alquiler') }}</th>
                                            <th class="text-center">{{ __('Gasto de compra') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr class="text-center">
                                    </thead>
                                    <tbody>
                                        @foreach ($compras as $compra)
                                            <tr>
                                                <td class="text-center">{{ $compra->DESCRIPCION }}</td>
                                                <td class="text-center">{{ $compra->FECHA_COMPRA->diffForHumans() }}
                                                </td>
                                                <td class="text-center">C${{ $compra->GASTO_TOTAL }}</td>
                                                <td class="text-center">
                                                    <a class="btn btn-dark mb-2 mb-md-0"
                                                        href="{{ route('compras.show', $compra->ID_COMPRA) }}">{{ __('Show') }}</a>
                                                    @can('compra-edit')
                                                        <a class="btn btn-primary mb-2 mb-md-0"
                                                            href="{{ route('compras.edit', $compra->ID_COMPRA) }}">{{ __('Edit') }}</a>
                                                    @endcan
                                                    @if (Route::has('compras.delete'))
                                                        <a href="{{ route('compras.delete', [$compra->ID_COMPRA]) }}"
                                                            class="btn btn-warning">{{ __('Eliminar') }}</a>
                                                    @endif
                                                    @can('compra-delete')
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['compras.destroy', $compra->ID_COMPRA], 'style' => 'display:inline']) !!}
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
