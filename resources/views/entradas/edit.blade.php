@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Editar entrada') }}</h2>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('entradas.index') }}" class="btn btn-primary" style="color:white">
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
                                            href="{{ route('entradas.index') }}">{{ __('Entradas') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __('Editar entrada') }}</li>
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
                        {!! Form::model($entrada, ['method' => 'PATCH', 'route' => ['entradas.update', $entrada->ID_ENTRADA]]) !!}
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>{{ __('Descripcion de entrada') }}:</strong>
                            </div>
                            {!! Form::text('DESCRIPCION_ENTRADA', $entrada->DESCRIPCION_ENTRADA, ['placeholder' => 'Descripcion de entrada', 'class' => 'form-control']) !!}
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>{{ __('Fecha entrada') }}:</strong>
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-secondary" id="toggle-dtp1">Fecha</button>
                                    {!! Form::text('FECHA_ENTRADA', $entrada->FECHA_ENTRADA, ['placeholder' => 'Fecha entrada', 'class' => 'form-control', 'id' => 'datetimepicker1']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>{{ __('Bodega') }}:</strong>
                                {!! Form::select('ID_BODEGA_PROYECTO', $bodegas, $entrada->ID_BODEGA_PROYECTO, ['class' => 'form-control', 'multiple']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3 d-none">
                            <div class="form-group">
                                <strong>{{ __('ID usuario') }}:</strong>
                            </div>
                            {!! Form::text('ID_USUARIO', $entrada->ID_USUARIO, ['placeholder' => 'ID usuario', 'class' => 'form-control']) !!}
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mx-auto">
                            <button type="submit" class="btn btn-warning">{{ __('Edit') }}</button>
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
    <link rel="stylesheet" href="{{ asset('Editor-2.0.5/css/editor.dataTables.css') }}">
@endsection
@section('js-content')
    <script src="{{ asset('datetimepicker-master/jquery.js') }}"></script>
    <script src="{{ asset('datetimepicker-master/build/jquery.datetimepicker.full.min.js') }}"></script>
    <script>
        $(function() {
            $('#datetimepicker1').datetimepicker({
                format: 'Y-M-d H:m:s',
                lang: 'es'
            });
            $('#datetimepicker2').datetimepicker({
                format: 'Y-M-d H:m:s',
                lang: 'es'
            });
            $("#toggle-dtp1").on('click', function() {
                $("#datetimepicker1").datetimepicker('toggle');
            });
            $("#toggle-dtp2").on('click', function() {
                $("#datetimepicker2").datetimepicker('toggle');
            });
        })
    </script>
@endsection
