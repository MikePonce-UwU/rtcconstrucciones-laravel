@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Administracion de usuarios') }}</h2>
                    </div>
                    <div class="col-auto">
                        @can('user-create')
                            <a href="{{ route('users.create') }}" class="btn btn-success" style="color:white"
                                {{-- data-bs-toggle="modal" data-bs-target="#modelCreate" --}}>
                                <span style="color:white"></span> {{ __('New') }}
                            </a>
                            {{-- @include('users.modals-user.create') --}}
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
                                    <li class="breadcrumb-item active">{{ __('Usuarios') }}</li>
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
                                Lista de usuarios
                            </div>
                            <div class="card-body">
                                <!-- table -->
                                <table class="table table-bordered mx-auto mx-md-0" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">{{ __('Name') }}</th>
                                            <th class="text-center">{{ __('Email') }}</th>
                                            <th class="text-center">{{ __('Roles') }}</th>
                                            <th class="text-center">{{ __('Created date') }}</th>
                                            <th class="text-center">{{ __('Updated date') }}</th>
                                            @if (!empty($user->email_verified_at))
                                                <th class="text-center">{{ __('Email verified date') }}</th>
                                            @endif
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr class="text-center">
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $user)
                                            <tr>
                                                <td class="text-center">{{ $user->name }}</td>
                                                <td class="text-center">{{ $user->email }}</td>
                                                <td class="text-center">
                                                    @if (!empty($user->getRoleNames()))
                                                        @foreach ($user->getRoleNames() as $v)
                                                            {{ $v }}
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td class="text-center">{{ $user->created_at }}</td>
                                                <td class="text-center">{{ $user->updated_at }}</td>
                                                @if (!empty($user->email_verified_at))
                                                    <td class="text-center">{{ $user->email_verified_at }}</td>
                                                @endif
                                                <td class="text-center">
                                                    <a class="btn btn-secondary"
                                                        href="{{ route('users.show', $user->id) }}">{{ __('Show') }}</a>
                                                    @can('user-edit')
                                                        <a class="btn btn-primary"
                                                            href="{{ route('users.edit', $user->id) }}">{{ __('Edit') }}</a>
                                                    @endcan
                                                    @if (Route::has('users.delete'))
                                                        <a href="{{ route('users.delete', [$user->id]) }}"
                                                            class="btn btn-warning">{{ __('Eliminar') }}</a>
                                                    @endif
                                                    @can('user-delete')
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
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
            $('#dataTable-1').dataTable({
                responsive: true,
            });
        });
    </script>
@endsection
