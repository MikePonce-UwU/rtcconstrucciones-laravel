<div class="col-xs-12 col-sm-12 col-md-12 mb-3">
    <div class="form-group">
        <strong>{{ __('Descripcion') }}:</strong>
        {!! Form::text('DESCRIPCION', null, ['placeholder' => 'Descripcion', 'class' => 'form-control']) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mb-3">
    <div class="form-group">
        <strong>{{ __('Fecha de compra') }}:</strong>
        <div class="input-group">
            <button type="button" class="btn btn-outline-secondary" id="toggle-dtp1">Fecha</button>
            {!! Form::text('FECHA_COMPRA', null, ['placeholder' => 'Fecha de compra', 'class' => 'form-control', 'id' => 'datetimepicker1']) !!}
        </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mb-3">
    <div class="form-group">
        <strong>{{ __('Bodega') }}:</strong>
        @php
            $value = null;
            if (isset($compra)) {
                $value = $compra->ID_BODEGA_PROYECTO;
            }
        @endphp
        {!! Form::select('ID_BODEGA_PROYECTO', $bodegas, $value, ['class' => 'form-control', 'multiple']) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mb-3">
    <div class="form-group">
        <strong>{{ __('Estado') }}:</strong>
        @php
            $value = null;
            if (isset($compra)) {
                $value = $compra->ID_ESTADO;
            }
        @endphp
        {!! Form::select('ID_ESTADO', $estados, $value, ['class' => 'form-control', 'multiple']) !!}
    </div>
</div>
