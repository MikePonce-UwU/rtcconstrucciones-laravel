@extends('layouts.app')

@section('content')
    <x-contentHeader header="{{ __('Alquileres') }}">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Alquileres') }}</li>
    </x-contentHeader>
    <x-content>
        @can('alquiler-create')
            <a href="{{ route('alquileres.create') }}" class="btn btn-success text-white">
                <span></span> {{ __('New') }}
            </a>
        @endcan
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
                        Listado de alquileres
                    </div>
                    <div class="card-body">
                        <!-- table -->
                        <table class="table table-bordered mx-auto mx-md-0" id="dataTable-1">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('Nombre') }}</th>
                                    <th class="text-center">{{ __('Direccion') }}</th>
                                    <th class="text-center">{{ __('Fecha alquiler') }}</th>
                                    <th class="text-center">{{ __('Total') }}</th>
                                    <th class="text-center">{{ __('Action') }}</th>
                                </tr class="text-center">
                            </thead>
                            <tbody>
                                @foreach ($alquileres as $alquiler)
                                    <tr>
                                        <td class="text-center">{{ $alquiler->NOMBRE_EMPRESA }}</td>
                                        <td class="text-center">{{ $alquiler->DIRECCION }}</td>
                                        <td class="text-center">{{ $alquiler->FECHA_ALQUILER }}</td>
                                        <td class="text-center">C${{ $alquiler->TOTAL_PAGAR }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-dark mb-2 mb-md-0"
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
                                @endforeach
                            </tbody>
                        </table>
                        <!-- end table -->
                    </div>
                </div>
            </div> <!-- .col-md-12 -->
        </div> <!-- end section row my-4 -->
    </x-content>


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
