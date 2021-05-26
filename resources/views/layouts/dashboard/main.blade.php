<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') Jimudu</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('auth/vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('auth/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('auth/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('auth/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('auth/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('auth/js/select.dataTables.min.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    @yield('styles')
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('auth/css/vertical-layout-light/style.css')}}">
    <!-- endinject -->
    <!-- Favicons -->
    <link href="{{asset('assets/img/icon.svg')}}" rel="icon">
    <link href="{{asset('assets/img/icon.svg')}}" rel="apple-touch-icon">
</head>
<body class="sidebar-fixed">
    <div class="container-scroller">
        @include('layouts.dashboard.navbar')
        <div class="container-fluid page-body-wrapper">
            @include('layouts.dashboard.sidebar')
            <div class="main-panel offset-md-2" id="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin " >
                            <div class="row">
                                <div class="col-12 mb-4 mb-xl-0">
                                    <h3 class="font-weight-bold text-center">@yield('content-title')</h3>
                                    <h6 class="font-weight-normal mb-0 mt-3 text-center">@yield('content-subtitle')</h6>
                                    @include('layouts.dashboard.alerts')

                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('layouts.dashboard.footer')
            </div>
        </div>
         <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('components.modals')
    <!-- plugins:js -->
    <script src="{{asset('auth/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('auth/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('auth/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('auth/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('auth/js/dataTables.select.min.js')}}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('auth/js/off-canvas.js')}}"></script>
    <script src="{{asset('auth/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('auth/js/template.js')}}"></script>
    <script src="{{asset('auth/js/settings.js')}}"></script>
    <script src="{{asset('auth/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('auth/js/dashboard.js')}}"></script>
    <script src="{{asset('auth/js/tooltips.js')}}"></script>
    <script src="{{asset('auth/js/Chart.roundedBarCharts.js')}}"></script>
    <script>
        $('[data-bs-toggle="tooltip"]').tooltip();
    </script>

    @yield('scripts')
    <!-- End custom js for this page-->
</body>
