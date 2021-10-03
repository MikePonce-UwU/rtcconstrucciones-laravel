@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Editar entrega de alquiler') }}</h2>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('entrega-alquileres.index') }}" class="btn btn-primary" style="color:white">
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
                                            href="{{ route('alquileres.index') }}">{{ __('Entrega Alquileres') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __('Editar entrega alquiler') }}</li>
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
                        {!! Form::model($entrega, ['method' => 'PATCH', 'route' => ['entrega-alquileres.update', $entrega->ID_ENTREGA_ALQUILER]]) !!}
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>{{ __('Horas excedidas') }}:</strong>
                                <div class="input-group">
                                    {!! Form::text('HORAS_EXCEDIDAS', $entrega->HORAS_EXCEDIDAS, ['placeholder' => 'Horas excedidas', 'class' => 'form-control']) !!}
                                    <span class="input-group-text">HORAS</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>{{ __('Pago excedido') }}:</strong>
                                <div class="input-group">
                                    <span class="input-group-text">C$</span>
                                    {!! Form::text('PAGO_EXCEDIDO', $entrega->PAGO_EXCEDIDO, ['placeholder' => 'Pago excedido', 'class' => 'form-control']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>{{ __('Bodega') }}:</strong>
                                {!! Form::select('ID_ALQUILER', $alquileres, $entrega->ID_ALQUILER, ['class' => 'form-control', 'multiple']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
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
