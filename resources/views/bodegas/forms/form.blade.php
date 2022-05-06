<div class="col-xs-12 col-sm-12 col-md-12 mt-3">
    <div class="form-group">
        <strong>{{ __('Nombre de la Bodega') }}:</strong>
        {!! Form::text('NOMBRE_BODEGA', null, ['placeholder' => 'Nombre de la Bodega', 'class' => 'form-control']) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mt-3">
    <div class="form-group">
        <strong>{{ __('Dirección') }}:</strong>
        {!! Form::text('DIRECCION', null, ['placeholder' => 'Dirección', 'class' => 'form-control']) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mt-3">
    <div class="form-group">
        <strong>{{ __('Fecha de Creación') }}: <i class="text-muted">@if (isset($bodega)) {{ $bodega->FECHA_CREACION }} @endif</i></strong>
        <div class="input-group">
            <button type="button" class="btn btn-outline-secondary" id="toggle-dtp1">Inicio</button>
            {!! Form::text('FECHA_CREACION', null, ['placeholder' => 'Fecha de Creación', 'class' => 'form-control', 'id' => 'datetimepicker1']) !!}
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mt-3">
    <div class="form-group">
        <strong>{{ __('Fecha de Cierre') }}: <i class="text-muted">@if (isset($bodega)) {{ $bodega->FECHA_CIERRE }} @endif</i></strong>
        <div class="input-group">
            <button type="button" class="btn btn-outline-secondary" id="toggle-dtp2">Fin</button>
            {!! Form::text('FECHA_CIERRE', null, ['placeholder' => 'Fecha de Cierre', 'class' => 'form-control', 'id' => 'datetimepicker2']) !!}
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mt-3">
    <div class="form-group">
        <strong>{{ __('Capacidad') }}:</strong>
        {!! Form::text('CAPACIDAD', null, ['placeholder' => 'Direccion', 'class' => 'form-control']) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mt-3 d-none">
    <div class="form-group">
        <strong>{{ __('Capacidad disponible') }}:</strong>
        {!! Form::text('CAPACIDAD_DISPONIBLE', 'TOTAL', ['placeholder' => 'Capacidad disponible', 'class' => 'form-control']) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mt-3">
    <div class="form-group">
        <strong>{{ __('Proyecto') }}:</strong>
        @php
            $value = null;
            if (isset($bodega)) {
                $value = $bodega->ID_PROYECTO;
            }
        @endphp
        {!! Form::select('ID_PROYECTO', $proyectos, $value, ['class' => 'form-control', 'multiple']) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mt-3">
    <div class="form-group">
        <strong>{{ __('Estado') }}:</strong>
        @php
            $value = null;
            if (isset($bodega)) {
                $value = $bodega->ID_ESTADO;
            }
        @endphp
        {!! Form::select('ID_ESTADO', $estados, $value, ['class' => 'form-control', 'multiple']) !!}
    </div>
</div>
