@extends('layouts.app')
@section('titulo', 'Compras')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Administración de Compras') }}</h2>
                    </div>
                    <div class="col-auto">
                        @can('compra-create')
                            <a href="{{ route('compras.create') }}" class="btn btn-success" style="color:white">
                                <span style="color:white"></span> {{ __('Crear Nueva Compra') }}
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
                                Listado de Compras
                            </div>
                            <div class="card-body">
                                <!-- table -->
                                <table class="table table-bordered mx-auto mx-md-0" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">{{ __('#') }}</th>
                                            <th class="text-center">{{ __('Descripción') }}</th>
                                            <th class="text-center">{{ __('Fecha Alquiler') }}</th>
                                            <th class="text-center">{{ __('Gasto de Compra') }}</th>
                                            <th class="text-center">{{ __('Acción') }}</th>
                                        </tr class="text-center">
                                    </thead>
                                    <tbody>
                                        @foreach ($compras as $compra)
                                            <tr>
                                                <td class="text-center">{{ $compra->ID_COMPRA }}</td>
                                                <td class="text-center">{{ $compra->DESCRIPCION }}</td>
                                                <td class="text-center">{{ $compra->FECHA_COMPRA->diffForHumans() }}
                                                </td>
                                                <td class="text-center">C${{ $compra->GASTO_TOTAL }}</td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                        Acción
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        <a class="dropdown-item btn btn-secondary" href="{{ route('compras.show', $compra->ID_COMPRA) }}">{{ __('Ver') }}</a>
                                                    <div class="dropdown-divider"></div>
                                                        @can('compra-edit')
                                                            <a class="dropdown-item btn btn-primary" href="{{ route('compras.edit', $compra->ID_COMPRA) }}">{{ __('Editar') }}</a>
                                                        @endcan
                                                    <div class="dropdown-divider"></div>
                                                        @if (Route::has('compras.delete'))
                                                            <a href="{{ route('compras.delete', [$compra->ID_COMPRA]) }}"
                                                                class="dropdown-item btn btn-warning">{{ __('Eliminar') }}</a>
                                                        @endif
                                                        @can('compra-delete')
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['compras.destroy', $compra->ID_COMPRA], 'style' => 'display:inline']) !!}
                                                            {!! Form::submit('Eliminar', ['class' => 'dropdown-item btn btn-danger']) !!}
                                                            {!! Form::close() !!}
                                                        @endcan
                                                    </div>                                                                                                                                                                 
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
            </div>
        </div>
    </div>
@endsection
