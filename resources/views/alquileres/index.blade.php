@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Alquileres') }}</h2>
                    </div>
                    <div class="col-auto">
                        @can('alquiler-create')
                            <a href="{{ route('alquileres.create') }}" class="btn btn-success text-white">
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
                                    <li class="breadcrumb-item active">{{ __('Alquileres') }}</li>
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
                                Listado de alquileres a bodegas
                            </div>
                            <div class="card-body">
                                <!-- table -->
                                <table class="table table-bordered" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">{{ __('Nombre') }}</th>
                                            <th class="text-center">{{ __('Cantidad') }}</th>
                                            <th class="text-center">{{ __('Fecha alquiler') }}</th>
                                            <th class="text-center">{{ __('Hora alquiler') }}</th>
                                            <th class="text-center">{{ __('pago por hora') }}</th>
                                            <th width="280px" class="text-center">{{ __('Action') }}</th>
                                        </tr class="text-center">
                                    </thead>
                                    @foreach ($alquileres as $alquiler)
                                        <tbody>
                                            <tr>
                                                <th class="text-center">{{ $alquiler->ID_ALQUILER }}</th>
                                                <td class="text-center">{{ $alquiler->NOMBRE }}</td>
                                                <td class="text-center">{{ $alquiler->CANTIDAD }}</td>
                                                <td class="text-center">{{ $alquiler->FECHA_ALQUILER }}</td>
                                                <td class="text-center">{{ $alquiler->HORAS_ALQUILER }}</td>
                                                <td class="text-center">{{ $alquiler->PAGO_HORA }}</td>
                                                <td class="text-center">
                                                    <a class="btn btn-secondary mb-2 mb-md-0"
                                                        href="{{ route('alquileres.show', $alquiler->ID_ALQUILER) }}">{{ __('Show') }}</a>
                                                    @can('alquiler-edit')
                                                        <a class="btn btn-primary mb-2 mb-md-0"
                                                            href="{{ route('alquileres.edit', $alquiler->ID_ALQUILER) }}">{{ __('Edit') }}</a>
                                                    @endcan
                                                    @if (Route::has('alquileres.delete'))
                                                        <a href="{{ route('alquileres.delete', [$alquiler->ID_ALQUILER]) }}"
                                                            class="btn btn-warning">{{ __('Eliminar') }}</a>
                                                    @endif
                                                    @can('alquiler-delete')
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['alquileres.destroy', $alquiler->ID_ALQUILER], 'style' => 'display:inline']) !!}
                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger mb-2 mb-md-0']) !!}
                                                        {!! Form::close() !!}
                                                    @endcan
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
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