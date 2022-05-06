<!-- Modal -->
<div class="modal fade" id="modelNuevoDetalle" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Producto a la Compra</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! Form::open(['route' => 'detalle-compras.store', 'method' => 'POST']) !!}
            <div class="modal-body">
                {!! Form::number('ID_COMPRA', $compra->ID_COMPRA, ['placeholder' => 'Compra', 'class' => 'form-control d-none']) !!}
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>{{ __('Nombre Producto') }}:</strong>
                        {!! Form::text('NOMBRE', null, ['placeholder' => 'Nombre Producto', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>{{ __('Cantidad') }}:</strong>
                        {!! Form::number('CANTIDAD', null, ['placeholder' => 'Cantidad', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>{{ __('Precio Producto') }}:</strong>
                        {!! Form::text('PRECIO', null, ['placeholder' => 'Precio Producto', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>{{ __('Categorias') }}:</strong>
                        {!! Form::select('ID_CATEGORIA', $categorias, [], ['class' => 'form-control', 'multiple']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>{{ __('Unidad de Medida') }}:</strong>
                        {!! Form::select('ID_UND_MEDIDA', $und_medida, [], ['class' => 'form-control', 'multiple']) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Guardar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>                
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
