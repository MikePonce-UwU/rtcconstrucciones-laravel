<div class="col-xs-12 col-sm-12 col-md-12 mb-3">
    <div class="input-group">
        <strong class="input-group-text">{{ __('Nombre Producto') }}:</strong>
        {!! Form::text('NOMBRE', null, ['placeholder' => 'Nombre Producto', 'class' => 'form-control']) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mb-3">
    <div class="input-group">
        <strong class="input-group-text col-auto">{{ __('Cantidad del Producto') }}</strong>
        {!! Form::text('CANTIDAD', null, ['placeholder' => 'Cantidad del Producto', 'class' => 'form-control col-10']) !!}<br>
        {!! Form::select('ID_UND_MEDIDA', $unidadMedida, null, ['class' => 'form-control col-2']) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mb-3">
    <div class="input-group">
        <strong class="input-group-text">{{ __('Estado') }}:</strong>
        {!! Form::select('ID_ESTADO', $estados, [], ['class' => 'form-control', '']) !!}
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 mb-3">
    <div class="input-group">
        <strong class="input-group-text">{{ __('Categoria') }}:</strong>
        {!! Form::select('ID_CATEGORIA', $categorias, [], ['class' => 'form-control', '']) !!}
    </div>
</div>
