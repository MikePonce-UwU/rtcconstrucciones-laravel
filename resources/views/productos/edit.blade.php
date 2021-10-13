@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Editar producto') }}</h2>
                    </div>
                    <div class="col-auto">

                        <a href="{{ route('productos.index') }}" class="btn btn-primary" style="color:white">
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
                                            href="{{ route('productos.index') }}">{{ __('Productos') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __('Editar producto') }}</li>
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
                    <div class="card-header text-center h1">Edit form</div>
                    <div class="card-body">
                        {!! Form::model($producto, ['method' => 'PATCH', 'route' => ['productos.update', $producto->ID_PRODUCTO]]) !!}
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Nombre producto') }}:</strong>
                                {!! Form::text('NOMBRE', $producto->NOMBRE, ['placeholder' => 'Nombre producto', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Cantidad de producto') }}:</strong>
                                <div class="input-group">
                                    {!! Form::number('CANTIDAD', $producto->CANTIDAD, ['placeholder' => 'Cantidad de producto', 'class' => 'form-control']) !!}
                                    {!! Form::select('UNIDAD_MEDIDA', $unidadMedida, $producto->UNIDAD_MEDIDA, ['class' => 'form-control']) !!}
                                </div>

                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Descripcion de estado') }}:</strong>
                                {!! Form::text('ESTADO_DESC', $producto->ESTADO_DESC, ['placeholder' => 'Descripcion de estado', 'class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Estado') }}:</strong>
                                {!! Form::select('ID_ESTADO', $estados, $producto->ID_ESTADO, ['class' => 'form-control', 'multiple']) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>{{ __('Categoria') }}:</strong>
                                {!! Form::select('ID_CATEGORIA', $categorias, $producto->ID_CATEGORIA, ['class' => 'form-control', 'multiple']) !!}
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
