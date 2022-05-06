@extends('layouts.app')
@section('titulo', 'Usuarios')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Administración de usuarios') }}</h2>
                    </div>
                    <div class="col-auto">
                        @can('user-create')
                            <a href="{{ route('users.create') }}" class="btn btn-success" style="color:white"
                                {{-- data-bs-toggle="modal" data-bs-target="#modelCreate" --}}>
                                <span style="color:white"></span> {{ __('Crear Nuevo Usuario') }}
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
                                            <th class="text-center">{{ __('#') }}</th>
                                            <th class="text-center">{{ __('Nombre') }}</th>
                                            <th class="text-center">{{ __('Correo') }}</th>
                                            <th class="text-center">{{ __('Rol') }}</th>
                                            <th class="text-center">{{ __('Estado') }}</th>
                                            <th class="text-center">{{ __('Fecha de Creación') }}</th>
                                            <th class="text-center">{{ __('Fecha de Modificación') }}</th>
                                            @if (!empty($user->email_verified_at))
                                                <th class="text-center">{{ __('Fecha de Verificación de correo') }}
                                                </th>
                                            @endif
                                            <th class="text-center">{{ __('Acción') }}</th>
                                        </tr class="text-center">
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $user)
                                            <tr>
                                                <td class="text-center">{{ $user->id }}</td>
                                                <td class="text-center">{{ $user->name }}</td>
                                                <td class="text-center">{{ $user->email }}</td>
                                                <td class="text-center">
                                                    @if (!empty($user->getRoleNames()))
                                                        @foreach ($user->getRoleNames() as $v)
                                                            {{ $v }}
                                                        @endforeach
                                                    @endif
                                                </td>
                                                @if ($user->estado->NOMBRE == 'Habilitado')
                                                    <td class="text-center text-success">{{ $user->estado->NOMBRE }}
                                                    </td>
                                                @else
                                                    <td class="text-center text-danger">{{ $user->estado->NOMBRE }}
                                                    </td>
                                                @endif

                                                <td class="text-center">{{ $user->created_at->format('M. d, Y') }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $user->created_at->format('M. d, Y') }}</td>
                                                @if (!empty($user->email_verified_at))
                                                    <td class="text-center">
                                                        {{ $user->email_verified_at->format('M. d, Y') }}</td>
                                                @endif
                                                <td class="text-center">
                                                    <button type="button"
                                                        class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="true">
                                                        Acción
                                                    </button>
                                                    <div class="dropdown-menu" style="">
                                                        <a class="dropdown-item btn btn-secondary"
                                                            href="{{ route('users.show', $user->id) }}">{{ __('Ver') }}</a>
                                                        <div class="dropdown-divider"></div>
                                                        @can('user-edit')
                                                            <a class="dropdown-item btn btn-primary"
                                                                href="{{ route('users.edit', $user->id) }}">{{ __('Editar') }}</a>
                                                        @endcan
                                                        {{--
                                                        <div class="dropdown-divider"></div>
                                                        @if (Route::has('users.delete'))
                                                            <a href="{{ route('users.delete', [$user->id]) }}"
                                                                class="dropdown-item btn btn-warning">{{ __('Eliminar') }}</a>
                                                        @endif
                                                        
                                                        @can('user-delete')
                                                            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id], 'style' => 'display:inline']) !!}
                                                            {!! Form::submit('Eliminar', ['class' => 'dropdown-item btn btn-danger']) !!}
                                                            {!! Form::close() !!}
                                                        @endcan
                                                        --}}
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
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->

@endsection
