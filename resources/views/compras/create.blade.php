@extends('layouts.app')
@section('content')
    <x-contentHeader header="{{ __('Crear nueva compra') }}">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a>
        </li>
        <li class="breadcrumb-item"><a href="{{ route('compras.index') }}">{{ __('Compras') }}</a>
        </li>
        <li class="breadcrumb-item active">{{ __('Crear nueva compra') }}</li>
    </x-contentHeader>
    <x-content>
        <a href="{{ route('compras.index') }}" class="btn btn-primary" style="color:white">
            <span style="color:white"></span> {{ __('Back') }}
        </a>
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
            <div class="card-header text-center h1">Formulario de compra</div>
            <div class="card-body">
                {!! Form::open(['route' => 'compras.store', 'method' => 'POST']) !!}
                @include('compras.forms.form')
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <a class="btn grey btn-outline-secondary ms-2" href="{{ route('compras.index') }}">
                        {{ __('Back') }}</a>
                    <button type="submit" class="btn btn-success ms-2">{{ __('Save') }}</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div> <!-- / .card -->
    </x-content>

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
