<div class="col-xs-12 col-sm-12 col-md-12 mb-3">
    <div class="form-group">
        <strong>{{ __('Nombre empresa') }}:</strong>
        {!! Form::text('NOMBRE_EMPRESA', null, ['placeholder' => 'Nombre empresa', 'class' => 'form-control']) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mb-3">
    <div class="form-group">
        <strong>{{ __('Direccion') }}:</strong>
        {!! Form::text('DIRECCION', null, ['placeholder' => 'Direccion', 'class' => 'form-control']) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mb-3">
    <div class="form-group">
        <strong>{{ __('Telefono') }}:</strong>
        {!! Form::text('TELEFONO', null, ['placeholder' => 'Telefono', 'class' => 'form-control']) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mb-3">
    <div class="form-group">
        <strong>{{ __('Fecha de alquiler') }}:</strong>
        <div class="input-group">
            <button type="button" class="btn btn-outline-secondary" id="toggle-dtp1">Inicio</button>
            {!! Form::text('FECHA_ALQUILER', null, ['placeholder' => 'Fecha de alquiler', 'class' => 'form-control', 'id' => 'datetimepicker1']) !!}
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mb-3">
    <div class="form-group">
        <strong>{{ __('Pago total') }}:</strong>
        <div class="input-group">
            <span class="input-group-text">C$</span>
            {!! Form::text('TOTAL_PAGAR', null, ['placeholder' => 'Pago total', 'class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mb-3">
    <div class="form-group">
        <strong>{{ __('Estado') }}:</strong>
        @php
            $value = null;
            if (isset($alquiler)) {
                $value = $alquiler->ID_ESTADO;
            }
        @endphp
        {!! Form::select('ID_ESTADO', $estados, [$value], ['class' => 'form-control', 'multiple']) !!}
    </div>
</div>
