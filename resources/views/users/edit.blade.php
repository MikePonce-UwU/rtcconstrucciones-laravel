@extends('layouts.app')
@section('titulo', 'Editar Usuario')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Editar Usuario') }}</h2>
                    </div>
                    <div class="col-auto">

                        <a href="{{ route('users.index') }}" class="btn btn-primary" style="color:white">
                            <span style="color:white"></span> {{ __('Volver') }}
                        </a>

                    </div>
                </div>
                <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('users.index') }}">{{ __('Usuarios') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __('Editar Usuario') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> Hubo algunos problemas con su entrada.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card shadow mb-4">
                    <div class="card-header text-center h1">Formulario de Edición</div>
                    <div class="card-body">
                        {!! Form::model($user, ['method' => 'PATCH', 'route' => ['users.update', $user->id]]) !!}
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>{{ __('Nombre') }}:</strong>
                                {!! Form::text('name', null, ['placeholder' => 'Nombre', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>{{ __('Correo') }}:</strong>
                                {!! Form::text('email', null, ['placeholder' => 'Correo', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>{{ __('Contraseña') }}:</strong>
                                {!! Form::password('password', ['placeholder' => 'Contraseña', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>{{ __('Confirmar Contraseña') }}:</strong>
                                {!! Form::password('confirm-password', ['placeholder' => 'Confirmar Contraseña', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>{{ __('Rol') }}:</strong>
                                {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control', 'multiple']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">                            
                            <button type="submit" class="btn btn-success">{{ __('Guardar') }}</button>
                            <a class="btn grey btn-danger" href="{{ route('users.index') }}">
                                {{ __('Cancelar') }}</a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div> <!-- / .card -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->

@endsection
