@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-xs-10 col-sm-10 col-md-10 col-lg-10">
                <div class="row align-items-center my-4">
                    <div class="col">
                        <h2 class="h3 mb-0 page-title">{{ __('Editar compra') }}</h2>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('compras.index') }}" class="btn btn-primary" style="color:white">
                            <span style="color:white"></span> {{ __('Back') }}
                        </a>
                    </div>
                </div>
                <div class="content-header row">
                    <div class="content-header-left col-md-12 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a
                                            href="{{ route('compras.index') }}">{{ __('Compras') }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ __('Editar compra') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card shadow mb-4">
                    <div class="card-header text-center h1">Formulario de edicion</div>
                    <div class="card-body">
                        {!! Form::model($compra, ['method' => 'PATCH', 'route' => ['compras.update', $compra->ID_COMPRA]]) !!}
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>{{ __('Descripcion') }}:</strong>
                            </div>
                            {!! Form::text('DESCRIPCION', $compra->DESCRIPCION, ['placeholder' => 'Descripcion', 'class' => 'form-control']) !!}
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>{{ __('Fecha de compra') }}:</strong>
                                <div class="input-group">
                                    <button type="button" class="btn btn-outline-secondary" id="toggle-dtp1">Fecha</button>
                                    {!! Form::text('FECHA_COMPRA', $compra->FECHA_COMPRA, ['placeholder' => 'Fecha de compra', 'class' => 'form-control', 'id' => 'datetimepicker1']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="form-group">
                                <strong>{{ __('Bodega') }}:</strong>
                                {!! Form::select('ID_BODEGA_PROYECTO', $bodegas, $compra->ID_BODEGA_PROYECTO, ['class' => 'form-control', 'multiple']) !!}
                            </div>
                        </div>
                        <hr>
                        <div class="row col-xs-12 col-sm-12 col-md-12 mb-3">
                            <div class="col h3 mb-2">Detalle de compra:</div>
                            <div class="col-auto">
                                <button type="button" class="btn btn-danger" id="nueva-linea">Nueva linea</button>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-10">
                                    <table class="table table-bordered mx-auto" id="dataTable-1">
                                        <thead>
                                            <th>Nombre</th>
                                            <th>Nombre</th>
                                            <th>Nombre</th>
                                            <th>Nombre</th>
                                            <th>Nombre</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($detalles as $detalle)
                                                <tr>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 mx-auto">
                            <button type="submit" class="btn btn-warning">{{ __('Edit') }}</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div> <!-- / .card -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->

@endsection
@section('css-content')
    <link rel="stylesheet" href="{{ asset('datetimepicker-master/jquery.datetimepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('Editor-2.0.5/css/editor.dataTables.css') }}">
@endsection
@section('js-content')
    <script src="{{ asset('datetimepicker-master/jquery.js') }}"></script>
    <script src="{{ asset('Editor-2.0.5/js/dataTables.editor.js') }}"></script>
    <script src="{{ asset('datetimepicker-master/build/jquery.datetimepicker.full.min.js') }}"></script>
    <script>
        $(function() {
            $('#datetimepicker1').datetimepicker({
                format: 'Y-m-d H:i:s',
                lang: 'es'
            });
            $('#datetimepicker2').datetimepicker({
                format: 'Y-m-d H:i:s',
                lang: 'es'
            });
            $("#toggle-dtp1").on('click', function() {
                $("#datetimepicker1").datetimepicker('show');
            });
            $("#toggle-dtp2").on('click', function() {
                $("#datetimepicker2").datetimepicker('show');
            });
        })
    </script>
    <script>
        $("#nueva-linea").on('click', function(ev) {
            ev.preventDefault();
            $("#dataTable-1").table().add();
        })
    </script>
    <script>
        var editor; // use a global for the submit and return data rendering in the examples

        $(document).ready(function() {
            editor = new $.fn.dataTable.Editor({
                ajax: "../php/staff.php",
                table: "#dataTable-1",
                fields: [{
                    label: "First name:",
                    name: "first_name"
                }, {
                    label: "Last name:",
                    name: "last_name"
                }, {
                    label: "Position:",
                    name: "position"
                }, {
                    label: "Office:",
                    name: "office"
                }, {
                    label: "Extension:",
                    name: "extn"
                }, {
                    label: "Start date:",
                    name: "start_date",
                    type: "datetime"
                }, {
                    label: "Salary:",
                    name: "salary"
                }]
            });

            // Activate an inline edit on click of a table cell
            $('#dataTable-1').on('click', 'tbody td:not(:first-child)', function(e) {
                editor.inline(this);
            });

            $('#dataTable-1').DataTable({
                dom: "Bfrtip",
                ajax: "../php/staff.php",
                order: [
                    [1, 'asc']
                ],
                columns: [{
                        data: null,
                        defaultContent: '',
                        className: 'select-checkbox',
                        orderable: false
                    },
                    {
                        data: "first_name"
                    },
                    {
                        data: "last_name"
                    },
                    {
                        data: "position"
                    },
                    {
                        data: "office"
                    },
                    {
                        data: "start_date"
                    },
                    {
                        data: "salary",
                        render: $.fn.dataTable.render.number(',', '.', 0, '$')
                    }
                ],
                select: {
                    style: 'os',
                    selector: 'td:first-child'
                },
                buttons: [{
                        extend: "create",
                        editor: editor
                    },
                    {
                        extend: "edit",
                        editor: editor
                    },
                    {
                        extend: "remove",
                        editor: editor
                    }
                ]
            });
        });
    </script>
@endsection
