<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Kepegawaian - Admin</title>

    <!-- Link Import -->
    <link href="{{ asset('assets/template-admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Link CSS -->
    <link href="{{ asset('assets/template-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/template-admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

</head>
<body id="page-top">
    <div id="wrapper">
        @include('admin.components.sidebar')
        <!-- Content -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                @yield('content')
            </div>
            @include('admin.components.footer')
        </div>
    </div>

    <!-- Button Keatas-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
</body>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('assets/template-admin/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/template-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('assets/template-admin/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('assets/template-admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/template-admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('assets/template-admin/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/js/chart-pie.js') }}"></script>
<script src="{{ asset('assets/template-admin/js/demo/datatables-demo.js') }}"></script>

</html>
