<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('titulo')</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}"></script>

    <link rel="icon" type="image/x-icon" href="{{ asset('agency-assets/casco.png') }}" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte-assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('adminlte-assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('adminlte-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('adminlte-assets/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte-assets/dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet"
        href="{{ asset('adminlte-assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    {{-- <link rel="stylesheet" href="{{ asset('adminlte-assets/plugins/daterangepicker/daterangepicker.css') }}"> --}}
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('adminlte-assets/plugins/summernote/summernote-bs4.min.css') }}">
    @yield('css-content')
    @yield('js-content')
    <!-- Data table -->
      <!--DATATABLES-->
      <link rel="stylesheet" href="{{ asset('datatables/jquery.dataTables.min.css') }}">
      <link rel="stylesheet" href="{{ asset('datatables/buttons.dataTables.min.css') }}">
      <link rel="stylesheet" href="{{ asset('datatables/responsive.dataTables.min.css') }}">      
      <link rel="stylesheet" href="{{ asset('datatables/datatables.min.css') }}">
      <!--<link rel="stylesheet" href="../public/css/bootstrap-select.min.css">-->

    <!-- DATE PICKER -->
    <link rel="stylesheet" href="{{ asset('datetimepicker-master/jquery.datetimepicker.css') }}">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('agency-assets/casco.png') }}" alt="RTConstrucciones"
                height="60" width="60">
        </div>
        {{-- @include('components.navigation') --}}
        <x-navigation />
        {{-- @include('components.sidenav') --}}
        <x-sidenav />
        <main class="content-wrapper">
            @yield('content')
        </main>
    </div>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <footer class="main-footer">
        <strong>Copyright &copy; {{ now()->format('Y') }}
            All rights reserved.
    </footer>
    <!-- jQuery -->
    <script src="{{ asset('adminlte-assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('adminlte-assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('adminlte-assets/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('adminlte-assets/plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('adminlte-assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('adminlte-assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('adminlte-assets/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('adminlte-assets/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('adminlte-assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('adminlte-assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
    </script>
    <!-- Summernote -->
    <script src="{{ asset('adminlte-assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('adminlte-assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte-assets/dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('adminlte-assets/dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('adminlte-assets/dist/js/pages/dashboard.js') }}"></script>
    
    <!--DATATABLES-->
    <script src="{{ asset('datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('datatables/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('datatables/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('datatables/buttons.print.min.js') }}"></script>    

    <script>
        $(document).ready(function() {
            $('#dataTable-1')
                .dataTable({
                    responsive: true,
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
        });
    </script>
    <!--
    <script src="../public/js/bootbox.min.js"></script>  
    <script src="../public/js/bootstrap-select.min.js"></script>  
    -->

</body>

</html>
