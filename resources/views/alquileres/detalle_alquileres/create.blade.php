<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Producto de Alquiler</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {!! Form::open(['method' => 'POST', 'route' => 'detalle-alquileres.store']) !!}
            <div class="modal-body">
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>{{ __('Nombre') }}:</strong>
                        {!! Form::text('NOMBRE', null, ['placeholder' => 'Nombre', 'class' => 'form-control']) !!}
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
                        <strong>{{ __('Horas de Alquiler') }}:</strong>
                        {!! Form::number('HORAS_ALQUILER', null, ['placeholder' => 'Horas de Alquiler', 'class' => 'form-control', 'id' => 'horas-alquiler']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>{{ __('Horas Excedidas') }}:</strong>
                        {!! Form::number('HORAS_EXCEDIDAS', null, ['placeholder' => 'Horas Excedidas', 'class' => 'form-control', 'id' => 'horas-excedidas']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>{{ __('Pago por Hora') }}:</strong>
                        {!! Form::number('PAGO_HORA', null, ['placeholder' => 'Pago por Hora', 'class' => 'form-control', 'id' => 'pago-hora']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>{{ __('Pago Excedido') }}:</strong>
                        <div class="input-group">
                            {!! Form::text('PAGO_EXCEDIDO', null, ['placeholder' => 'Pago Excedido', 'class' => 'form-control disabled', 'id' => 'pago-excedido']) !!}
                            <button type="button" id="btn-pago-excedido" class="btn btn-outline-info"
                                onclick="pago();">Calcular</button>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>{{ __('Subtotal') }}:</strong>
                        <div class="input-group">
                            {!! Form::text('SUBTOTAL', null, ['placeholder' => 'Subtotal', 'class' => 'form-control disabled', 'id' => 'subtotal']) !!}
                            <button type="button" id="btn-pago-excedido" class="btn btn-outline-info"
                                onclick="total();">Calcular</button>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                    <div class="form-group">
                        <strong>{{ __('Bodega') }}:</strong>
                        {!! Form::select('ID_BODEGA_PROYECTO', $bodegas, null, ['class' => 'form-control', 'multiple']) !!}
                    </div>
                </div>
                {!! Form::text('ID_ALQUILER', $alquiler->ID_ALQUILER, ['placeholder' => 'Alquiler', 'class' => 'form-control d-none']) !!}
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Guardar</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@section('js-content')
    <script>
        function pago() {
            let pago_excedido = document.getElementById('pago-excedido');
            let ph = document.getElementById('pago-hora');
            let he = document.getElementById('horas-excedidas');
            var pe = ph.value * he.value;
            pago_excedido.value = pe;
        }

        function total() {
            let sub = document.getElementById('subtotal');
            let ha = document.getElementById('horas-alquiler');
            let ph = document.getElementById('pago-hora');
            let pe = document.getElementById('pago-excedido');
            var s = Number(ha.value * ph.value) + Number(pe.value);
            sub.value = s;
        }
    </script>
@endsection
