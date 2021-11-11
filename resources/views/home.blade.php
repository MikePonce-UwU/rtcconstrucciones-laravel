@extends('layouts.app')
@section('titulo', 'Dashboard')
@section('content')
    <x-contentHeader header="{{ __('Vista principal') }}">
        <li class="breadcrumb-item active">{{ __('Dashboard') }}</li>
    </x-contentHeader>
    <x-content>
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ App\Models\Salida::whereDate('FECHA_SALIDA', '=', Carbon\Carbon::now())->count() }}</h3>

                        <p>Nuevas salidas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('salidas.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ App\Models\Entrada::whereDate('FECHA_ENTRADA', '=', Carbon\Carbon::now())->count() }}</h3>

                        <p>Nuevas entradas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('entradas.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ App\Models\Proyecto::whereDate('FECHA_INICIO', '=', Carbon\Carbon::now())->count() }}</h3>

                        <p>Nuevos proyectos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('proyectos.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ App\Models\Bodega::whereDate('FECHA_CREACION', '=', Carbon\Carbon::now())->count() }}</h3>

                        <p>Nuevas bodegas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('bodegas.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </x-content>
@endsection
