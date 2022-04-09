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
                    <a href="{{ route('salidas.index') }}" class="small-box-footer">Ver <i
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
                    <a href="{{ route('entradas.index') }}" class="small-box-footer">Ver <i
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
                    <a href="{{ route('proyectos.index') }}" class="small-box-footer">Ver <i
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
                    <a href="{{ route('bodegas.index') }}" class="small-box-footer">Ver <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ App\Models\Bodega::whereDate('FECHA_CREACION', '=', Carbon\Carbon::now())->count() }}</h3>

                        <p>Productos</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('productos.index') }}" class="small-box-footer">Ver<i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row mb-3">
            <div class="col-12 col-md-8">
                <div class="card">
                    <h5 class="card-title mx-auto my-3" style="font-weight:bold;">Lista de proyectos
                        finalizados</h5>
                    <table class="table table-bordered mx-auto mx-md-0" id="dataTable-1">
                        <thead>
                            <tr>
                                <th>Nombre proyecto</th>
                                <th>Descripción</th>
                                <th>Fecha Fin</th>
                                <th>Detalles</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Models\Proyecto::whereDate('FECHA_FINALIZACION', '<=', Carbon\Carbon::now())->get() as $proyecto)
                                <tr>
                                    <td>{{ $proyecto->NOMBRE }}</td>
                                    <td>{{ $proyecto->DESCRIPCION }}</td>
                                    <td>{{ $proyecto->FECHA_FINALIZACION }}</td>
                                    <td><a href="{{ route('proyectos.show', $proyecto->ID_PROYECTO) }}"
                                            class="btn btn-link">Ver</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>                
            </div>
            <div class="col-12 col-md-4">
                <div class="card">
                    <h5 class="card-title mx-auto my-2" style="font-weight: bold;">Lista de productos</h5>
                    <ul class="list-group list-group-flush">
                        @php
                            $productos = App\Models\Producto::paginate(5);
                        @endphp
                        @foreach ($productos as $producto)
                            <li class="list-group-item">{{ $producto->NOMBRE }}</li>
                        @endforeach
                        {{ $productos->links() }}
                    </ul>
                </div>
            </div>
        </div>        
    </x-content>
@endsection
