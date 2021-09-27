@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Editar bodega') }}</h2>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('bodegas.index') }}" class="btn btn-primary" style="color:white">
                            <span style="color:white"></span> {{ __('Back') }}
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
                                            href="{{ route('bodegas.index') }}">{{ __('Bodegas') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __('Editar bodega') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card shadow mb-4">
                    <div class="card-header text-center h1">Formulario de edicion</div>
                    <div class="card-body">
                        {!! Form::model($bodega, ['method' => 'PATCH', 'route' => ['bodegas.update', $bodega->id]]) !!}
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                            <div class="form-group">
                                <strong>{{ __('Nombre de la bodega') }}:</strong>
                                {!! Form::text('NOMBRE_BODEGA', $bodega->NOMBRE_BODEGA, ['placeholder' => 'Nombre de la bodega', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                            <div class="form-group">
                                <strong>{{ __('Direccion') }}:</strong>
                                {!! Form::text('DIRECCION', $bodega->DIRECCION, ['placeholder' => 'Direccion', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                            <div class="form-group">
                                <strong>{{ __('Encargado') }}:</strong>
                                {!! Form::text('NOMBRE_ENCARGADO', $bodega->NOMBRE_ENCARGADO, ['placeholder' => 'Encargado de bodega', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                            <div class="form-group">
                                <strong>{{ __('Fecha de creacion') }}:</strong>
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-secondary" id="toggle-dtp1">Inicio</button>
                                    {!! Form::text('FECHA_CREACION', $bodega->FECHA_CREACION, ['placeholder' => 'Fecha de creacion', 'class' => 'form-control', 'id' => 'datetimepicker1']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                            <div class="form-group">
                                <strong>{{ __('Fecha de cierre') }}:</strong>
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-secondary" id="toggle-dtp2">Fin</button>
                                    {!! Form::text('FECHA_CIERRE', $bodega->FECHA_CIERRE, ['placeholder' => 'Fecha de cierre', 'class' => 'form-control', 'id' => 'datetimepicker2']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                            <div class="form-group">
                                <strong>{{ __('Capacidad') }}:</strong>
                                {!! Form::text('CAPACIDAD', $bodega->CAPACIDAD, ['placeholder' => 'Capacidad', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                            <div class="form-group">
                                <strong>{{ __('Proyecto') }}:</strong>
                                {!! Form::select('ID_PROYECTO', $proyectos, $bodega->ID_PROYECTO, ['class' => 'form-control', 'multiple']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                            <a class="btn grey btn-outline-secondary ms-2" href="{{ route('bodegas.index') }}">
                                {{ __('Back') }}</a>
                            <button type="submit" class="btn btn-success ms-2">{{ __('Save') }}</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div> <!-- / .card -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->

@endsection
@section('css-content')
    <link rel="stylesheet" href="{{ asset('datetimepicker-master/jquery.datetimepicker.css') }}">
@endsection
@section('js-content')
    <script src="{{ asset('datetimepicker-master/jquery.js') }}"></script>
    <script src="{{ asset('datetimepicker-master/build/jquery.datetimepicker.full.min.js') }}"></script>
    <script>
        $(function() {
            $('#datetimepicker1').datetimepicker({
                format: 'Y-m-d H:i:s',
                lang: 'es'
            });
            $('#datetimepicker2').datetimepicker({
                format: 'Y-m-d H:i:s',
                lang: 'es'
            });
            $("#toggle-dtp1").on('click', function() {
                $("#datetimepicker1").datetimepicker('show');
            });
            $("#toggle-dtp2").on('click', function() {
                $("#datetimepicker2").datetimepicker('show');
            });
        })
    </script>
@endsection
