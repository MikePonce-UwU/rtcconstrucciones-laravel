<div class="col-xs-12 col-sm-12 col-md-12 mb-3">
    <div class="form-group">
        <strong>{{ __('Nombre Empresa') }}:</strong>
        {!! Form::text('NOMBRE_EMPRESA', null, ['placeholder' => 'Nombre Empresa', 'class' => 'form-control']) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mb-3">
    <div class="form-group">
        <strong>{{ __('Dirección') }}:</strong>
        {!! Form::text('DIRECCION', null, ['placeholder' => 'Dirección', 'class' => 'form-control']) !!}
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
        <strong>{{ __('Fecha de Alquiler') }}: <i class="text-muted">@if (isset($alquiler)) {{ $alquiler->FECHA_ALQUILER }} @endif</i></strong>
        <div class="input-group">
            <button type="button" class="btn btn-outline-secondary" id="toggle-dtp1">Inicio</button>
            {!! Form::text('FECHA_ALQUILER', null, ['placeholder' => 'Fecha de alquiler', 'class' => 'form-control', 'id' => 'datetimepicker1']) !!}
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mb-3">
    <div class="form-group">
        <strong>{{ __('Pago Total') }}:</strong>
        <div class="input-group">
            <span class="input-group-text">C$</span>
            {!! Form::text('TOTAL_PAGAR', null, ['placeholder' => 'Pago Total', 'class' => 'form-control']) !!}
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
