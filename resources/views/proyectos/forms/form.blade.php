<div class="col-xs-12 col-sm-12 col-md-12 mt-3">
    <div class="form-group">
        <strong>{{ __('Nombre') }}:</strong>
        {!! Form::text('NOMBRE', null, ['placeholder' => 'Nombre del proyecto', 'class' => 'form-control']) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mt-3">
    <div class="form-group">
        <strong>{{ __('Fecha de inicio') }}: <i class="text-muted">@if (isset($proyecto)) {{ $proyecto->FECHA_INICIO }} @endif</i></strong>
        <div class="input-group">
            <button type="button" class="btn btn-outline-secondary" id="toggle-dtp1">Inicio</button>
            {!! Form::text('FECHA_INICIO', null, ['placeholder' => 'Fecha de inicio', 'class' => 'form-control', 'id' => 'datetimepicker1']) !!}
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mt-3">
    <div class="form-group">
        <strong>{{ __('Fecha de Finalizacion') }}: <i class="text-muted">@if (isset($proyecto)) {{ $proyecto->FECHA_FINALIZACION }} @endif</i></strong>
        <div class="input-group">
            <button type="button" class="btn btn-outline-secondary" id="toggle-dtp2">Fin</button>
            {!! Form::text('FECHA_FINALIZACION', null, ['placeholder' => 'Fecha de finalizacion', 'class' => 'form-control', 'id' => 'datetimepicker2']) !!}
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mt-3">
    <div class="form-group">
        <strong>{{ __('Descripcion') }}:</strong>
        {!! Form::text('DESCRIPCION', null, ['placeholder' => 'Descripcion', 'class' => 'form-control']) !!}
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
        <strong>{{ __('Tipo') }}:</strong>
    </div>
    @php
        $value = null;
        if (isset($proyecto)) {
            $value = $proyecto->ID_TIPO_PROYECTO;
        }
    @endphp
    {!! Form::select('ID_TIPO_PROYECTO', $tipo, $value, ['multiple', 'class' => 'form-control']) !!}
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mt-3">
    <div class="form-group">
        <strong>{{ __('Estado') }}:</strong>
    </div>
    @php
        $value = null;
        if (isset($proyecto)) {
            $value = $proyecto->ID_ESTADO;
        }
    @endphp
    {!! Form::select('ID_ESTADO', $estado, $value, ['multiple', 'class' => 'form-control']) !!}
</div>
