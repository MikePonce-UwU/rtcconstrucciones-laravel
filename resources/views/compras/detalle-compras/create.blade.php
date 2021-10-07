<!-- Modal -->
<div class="modal fade" id="modelNuevoDetalle" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalle de compra:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! Form::open(['route' => 'detalle-compras.store', 'method' => 'POST']) !!}
            <div class="modal-body">
                {!! Form::number('ID_COMPRA', $compra->ID_COMPRA, ['placeholder' => 'Compra', 'class' => 'form-control d-none']) !!}
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>{{ __('Nombre producto') }}:</strong>
                        {!! Form::text('NOMBRE', null, ['placeholder' => 'Nombre producto', 'class' => 'form-control']) !!}
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
                        <strong>{{ __('Precio producto') }}:</strong>
                        {!! Form::text('PRECIO', null, ['placeholder' => 'Precio producto', 'class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>{{ __('Categorias') }}:</strong>
                        {!! Form::select('ID_CATEGORIA', $categorias, [], ['class' => 'form-control', 'multiple']) !!}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
