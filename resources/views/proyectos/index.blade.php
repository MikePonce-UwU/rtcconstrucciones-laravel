@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Proyectos') }}</h2>
                    </div>
                    <div class="col-auto">
                        @can('proyecto-create')
                            <a href="{{ route('proyectos.create') }}" class="btn btn-success text-white">
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
                                    <li class="breadcrumb-item active">{{ __('Proyectos') }}</li>
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
                                Listado de proyectos activos
                            </div>
                            <div class="card-body">
                                <!-- table -->
                                <table class="table table-bordered" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">{{ __('Nombre proyecto') }}</th>
                                            <th class="text-center">{{ __('Fecha inicio') }}</th>
                                            <th class="text-center">{{ __('Fecha finalizacion') }}</th>
                                            <th class="text-center">{{ __('Direccion') }}</th>
                                            <th width="280px" class="text-center">{{ __('Action') }}</th>
                                        </tr class="text-center">
                                    </thead>
                                    @foreach ($proyectos as $proyecto)
                                        <tbody>
                                            <tr>
                                                <td class="text-center">{{ $proyecto->ID_PROYECTO }}</td>
                                                <td class="text-center">{{ $proyecto->NOMBRE }}</td>
                                                <td class="text-center">
                                                    {{ $proyecto->FECHA_INICIO }}
                                                </td>
                                                <td class="text-center">{{ $proyecto->FECHA_FINALIZACION }}</td>
                                                <td class="text-center">{{ $proyecto->DIRECCION }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('proyectos.show', $proyecto->ID_PROYECTO) }}"
                                                        class="btn btn-dark text-white mb-2 mb-md-0">
                                                        <span></span> {{ __('Show') }}
                                                    </a>
                                                    @can('proyecto-edit')
                                                        <a href="{{ route('proyectos.edit', $proyecto->ID_PROYECTO) }}"
                                                            class="btn btn-success text-white mb-2 mb-md-0">
                                                            <span></span> {{ __('Edit') }}
                                                        </a>
                                                    @endcan
                                                    @if (Route::has('proyecto.delete'))
                                                        <a href="{{ route('proyecto.delete', [$bodega->ID_PROYECTO]) }}"
                                                            class="btn btn-warning">{{ __('Eliminar') }}</a>
                                                    @endif
                                                    @can('proyecto-delete')
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['proyectos.destroy', $proyecto->ID_PROYECTO], 'style' => 'display:inline']) !!}
                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger text-white mb-2 mb-md-0']) !!}
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
@section('js-content')

@endsection
