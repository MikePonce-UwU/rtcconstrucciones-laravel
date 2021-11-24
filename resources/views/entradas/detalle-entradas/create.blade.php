<!-- Modal -->
<div class="modal fade" id="modelNuevoDetalle" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            {!! Form::open(['method' => 'POST', 'route' => 'detalle-entradas.store']) !!}
            <div class="modal-header">
                <h5 class="modal-title">Detalle de entrada:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="ID_DETALLE_ENTRADA" id="ID_DETALLE_ENTRADA">
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>{{ __('Cantidad') }}:</strong>
                        {!! Form::text('CANTIDAD', null, ['placeholder' => 'Cantidad', 'class' => 'form-control', 'id' => 'CANTIDAD']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>{{ __('Estado') }}:</strong>
                        {!! Form::select('ID_ESTADO', $estados, null, ['class' => 'form-control', 'id' => 'ESTADO_DESC', 'multiple']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>{{ __('Producto') }}:</strong>
                        <select name="ID_PRODUCTO" id="idproducto" class="form-control" multiple>
                            @foreach ($entrada->bodega_proyecto->salida as $salida)
                                @foreach ($salida->detalle_salida as $detalle_salida)
                                    @if (is_array($detalle_salida->producto))
                                        @foreach ($detalle_salida->producto as $product)

                                            <option value="{{ $product->ID_PRODUCTO }}">{{ $product->NOMBRE }}</p>
                                        @endforeach
                                    @else
                                        <option value="{{ $detalle_salida->producto->ID_PRODUCTO }}">
                                            {{ $detalle_salida->producto->NOMBRE }}</p>

                                    @endif

                                @endforeach
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3 d-none">
                    <div class="form-group">
                        <strong>{{ __('ID entrada') }}:</strong>
                        {!! Form::number('ID_ENTRADA', $entrada->ID_ENTRADA, ['placeholder' => 'ID entrada', 'class' => 'form-control', 'id' => 'ID_ENTRADA']) !!}
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
