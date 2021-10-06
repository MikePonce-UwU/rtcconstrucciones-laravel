@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Crear nueva compra') }}</h2>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('compras.index') }}" class="btn btn-primary" style="color:white">
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
                                            href="{{ route('compras.index') }}">{{ __('Compras') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __('Crear nueva compra') }}</li>
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
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>{{ __('Compra #' . $compra->ID_COMPRA) }}:</strong>
                        {{ $compra->DESCRIPCION }}
                    </div>
                    <div class="form-group">
                        <strong>{{ __('Fecha compra') }}:</strong>
                        {{ $compra->FECHA_COMPRA }}
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header text-center h1">Formulario de compra</div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'detalle-compras.store', 'method' => 'POST']) !!}
                        {!! Form::number('ID_COMPRA', $compra->ID_COMPRA, ['placeholder' => 'Compra', 'class' => 'form-control d-none']) !!}
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>{{ __('Nombre producto') }}:</strong>
                                {!! Form::text('NOMBRE', null, ['placeholder' => 'Nombre producto', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>{{ __('Cantidad') }}:</strong>
                                {!! Form::number('CANTIDAD', null, ['placeholder' => 'Cantidad', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>{{ __('Precio producto') }}:</strong>
                                {!! Form::text('PRECIO', null, ['placeholder' => 'Precio producto', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>{{ __('Categorias') }}:</strong>
                                {!! Form::select('ID_CATEGORIA', $categorias, [], ['class' => 'form-control', 'multiple']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <a class="btn grey btn-outline-secondary ms-2" href="{{ route('alquileres.index') }}">
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
