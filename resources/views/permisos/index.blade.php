@extends('layouts.app')
{{--  --}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Administracion de permisos') }}</h2>
                    </div>
                    <div class="col-auto">
                        @can('permission-create')
                            <a href="{{ route('permisos.create') }}" class="btn btn-success" style="color:white">
                                <span style="color:white"></span> {{ __('New') }}
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
                                    <li class="breadcrumb-item active">{{ __('Permisos') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header text-center h1">Lista de permisos</div>
                            <div class="card-body">
                                <!-- table -->
                                <table class="table table-bordered" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">{{ __('Name') }}</th>
                                            <th width="280px" class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    @foreach ($permisos as $permiso)
                                        <tbody>
                                            <tr>
                                                <td class="text-center">{{ $permiso->id }}</td>
                                                <td class="text-center">{{ $permiso->name }}</td>
                                                <td class="text-center">
                                                    <a class="btn btn-dark text-white"
                                                        href="{{ route('permisos.show', $permiso->id) }}">Show</a>
                                                    @can('permission-delete')
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['permisos.destroy', $permiso->id], 'style' => 'display:inline']) !!}
                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
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