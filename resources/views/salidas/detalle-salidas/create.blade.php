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
                        <strong>{{ __('Producto') }}:</strong>
                        <select name="ID_PRODUCTO" class="form-control" id="productos" multiple>
                            @foreach ($productos as $producto)
                                <option id="{{ $producto->CANTIDAD }}" value="{{ $producto->ID_PRODUCTO }}">
                                    {{ $producto->NOMBRE }} ({{ $producto->CANTIDAD }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="input-group has validation">
                        <strong class="input-group-text">{{ __('Cantidad') }}:</strong>
                        {!! Form::number('CANTIDAD', null, ['placeholder' => 'Cantidad', 'class' => 'form-control', 'id' => 'cantidad']) !!}
                        <button type="button" class="btn btn-success" onchange="validadCantidad();">Validar
                            cantidad</button>
                        <div id="cantidadOwO"></div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>{{ __('Descripcion') }}:</strong>
                        {!! Form::select('ID_ESTADO', $estados, null, ['class' => 'form-control', 'multiple']) !!}
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
@section('js-content')
    <script>
        var id = 0;
        $("#productos").on("change", function() {
            id = parseInt($(this).children(":selected").attr("id"));
            console.log(id.toString())
        });
        const valid_text = "cantidad valida"
        const invalid_text = "cantidad invalida"
        const validadCantidad = () => {
            if ($("#cantidad").val() > id) {
                //
                $("#cantidad").removeClass(['is-valid'])
                $("#cantidad").addClass(['is-invalid'])
                $("#cantidadOwO").removeClass(['valid-feedback'])
                $("#cantidadOwO").addClass(['invalid-feedback'])
                $("#cantidadOwO").html(invalid_text)
            } else if ($("#cantidad").val() < id) {
                //
                $("#cantidad").removeClass(['is-invalid'])
                $("#cantidad").addClass(['is-valid'])
                $("#cantidadOwO").removeClass(['invalid-feedback'])
                $("#cantidadOwO").addClass(['valid-feedback'])
                $("#cantidadOwO").html(valid_text)
            }
        }
    </script>
@endsection
