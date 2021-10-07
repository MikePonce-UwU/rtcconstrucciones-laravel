<!-- Modal -->
<div class="modal fade" id="modelNuevoDetalle" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalle de salida:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! Form::open(['method' => 'POST', 'route' => 'detalle-salidas.store']) !!}
            <div class="modal-body">
                <input type="hidden" name="ID_DETALLE_SALIDA" id="ID_DETALLE_SALIDA">
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>{{ __('Descripcion') }}:</strong>
                        {!! Form::text('ESTADO_DESC', null, ['placeholder' => 'Descripcion', 'class' => 'form-control', 'id' => 'ESTADO_DESC']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>{{ __('Cantidad') }}:</strong>
                        {!! Form::text('CANTIDAD', null, ['placeholder' => 'Cantidad', 'class' => 'form-control', 'id' => 'CANTIDAD']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>{{ __('Producto') }}:</strong>
                        {!! Form::select('ID_PRODUCTO', $productos, [], ['class' => 'form-control', 'multiple', 'id' => 'ID_PRODUCTO']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3 d-none">
                    <div class="form-group">
                        <strong>{{ __('ID salida') }}:</strong>
                        {!! Form::number('ID_SALIDA', $salida->ID_SALIDA, ['placeholder' => 'ID salida', 'class' => 'form-control', 'id' => 'ID_SALIDA']) !!}
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
