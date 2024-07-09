<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
  
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('templateAdmin/plugins/fontawesome-free/css/all.min.css') }}">
  
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('templateAdmin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('templateAdmin/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('templateAdmin/plugins/jqvmap/jqvmap.min.css') }}">
  
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('templateAdmin/dist/css/adminlte.min.css') }}">
  
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('templateAdmin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('templateAdmin/plugins/daterangepicker/daterangepicker.css') }}">
  
    <!-- Summernote -->
    <link rel="stylesheet" href="{{ asset('templateAdmin/plugins/summernote/summernote-bs4.min.css') }}">
  
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('templateAdmin/css/custom.css') }}">

    {{-- comfirm --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  </head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Navbar -->
  @include('admin.nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('admin.sidebar')

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
  
  <!-- Control Sidebar -->
  @include('admin.footer')
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('templateAdmin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<!-- AdminLTE -->
<script src="{{ asset('templateAdmin/dist/js/adminlte.js') }}"></script>
<!-- Demo -->
<script src="{{ asset('templateAdmin/dist/js/demo.js') }}"></script>
<!-- jQuery UI -->
<script src="{{ asset('templateAdmin/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('templateAdmin/plugins/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('templateAdmin/plugins/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('templateAdmin/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('templateAdmin/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob -->
<script src="{{ asset('templateAdmin/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- Moment.js -->
<script src="{{ asset('templateAdmin/plugins/moment/moment.min.js') }}"></script>
<!-- Date range picker -->
<script src="{{ asset('templateAdmin/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('templateAdmin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('templateAdmin/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('templateAdmin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- CKEditor -->
<script>
  ClassicEditor.create(document.querySelector('#ckeditor')).catch(error => {
    console.error(error);
  });
</script>
<!-- Custom JavaScript -->
<script src="{{ asset('templateAdmin/js/upload.js') }}"></script>
<script src="{{ asset('templateAdmin/js/custom.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</body>
</html>
