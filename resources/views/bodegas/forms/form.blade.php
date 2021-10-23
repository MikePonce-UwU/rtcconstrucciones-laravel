<div class="col-xs-12 col-sm-12 col-md-12 mt-3">
    <div class="form-group">
        <strong>{{ __('Nombre de la bodega') }}:</strong>
        {!! Form::text('NOMBRE_BODEGA', null, ['placeholder' => 'Nombre de la bodega', 'class' => 'form-control']) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mt-3">
    <div class="form-group">
        <strong>{{ __('Direccion') }}:</strong>
        {!! Form::text('DIRECCION', null, ['placeholder' => 'Direccion', 'class' => 'form-control']) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mt-3">
    <div class="form-group">
        <strong>{{ __('Fecha de creacion') }}:</strong>
        <div class="input-group">
            <button type="button" class="btn btn-outline-secondary" id="toggle-dtp1">Inicio</button>
            {!! Form::text('FECHA_CREACION', null, ['placeholder' => 'Fecha de creacion', 'class' => 'form-control', 'id' => 'datetimepicker1']) !!}
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mt-3">
    <div class="form-group">
        <strong>{{ __('Fecha de cierre') }}:</strong>
        <div class="input-group">
            <button type="button" class="btn btn-outline-secondary" id="toggle-dtp2">Fin</button>
            {!! Form::text('FECHA_CIERRE', null, ['placeholder' => 'Fecha de cierre', 'class' => 'form-control', 'id' => 'datetimepicker2']) !!}
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
