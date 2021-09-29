@extends('layouts.app')
{{--  --}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Administracion de roles') }}</h2>
                    </div>
                    <div class="col-auto">
                        @can('role-create')
                            <a href="{{ route('roles.create') }}" class="btn btn-success" style="color:white">
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
                                    <li class="breadcrumb-item active">{{ __('Roles') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row my-4">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header text-center h1">Lista de roles</div>
                            <div class="card-body">
                                <!-- table -->
                                <table class="table table-bordered mx-auto mx-md-0" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">{{ __('Name') }}</th>
                                            <th width="280px" class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $role)
                                            <tr>
                                                <td class="text-center">{{ $role->name }}</td>
                                                {{-- <td class="text-center">
                                                    @foreach ($rolesPermissions as $permisssion)
                                                        {{ $permission->name }}
                                                    @endforeach
                                                </td> --}}
                                                <td class="text-center">
                                                    <a class="btn btn-secondary"
                                                        href="{{ route('roles.show', $role->id) }}">Show</a>
                                                    @can('role-edit')
                                                        <a class="btn btn-primary"
                                                            href="{{ route('roles.edit', $role->id) }}">Edit</a>
                                                    @endcan
                                                    @if (Route::has('roles.delete'))
                                                        <a href="{{ route('roles.delete', [$role->id]) }}"
                                                            class="btn btn-warning">{{ __('Eliminar') }}</a>
                                                    @endif
                                                    @can('role-delete')
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
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
