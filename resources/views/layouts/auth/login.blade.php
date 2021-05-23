<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title') | Jimudu </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('auth/vendors/feather/feather.css')}}">
    <link rel="stylesheet" href="{{asset('auth/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('auth/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('auth/css/vertical-layout-light/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('assets/img/icon.svg')}}" />
</head>

<body >
<div class="container-scroller" >
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo d-flex justify-content-center">
                            <img src="{{asset('assets/img/logo.svg')}}" alt="logo">
                        </div>
                            @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{asset('auth/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('auth/js/off-canvas.js')}}"></script>
<script src="{{asset('auth/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('auth/js/template.js')}}"></script>
<script src="{{asset('auth/js/settings.js')}}"></script>
<script src="{{asset('auth/js/todolist.js')}}"></script>

@yield('scripts')
<!-- endinject -->
</body>

</html>
