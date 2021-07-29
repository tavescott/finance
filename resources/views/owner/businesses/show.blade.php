<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ona biashara - Imudu</title>
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
<!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('auth/css/vertical-layout-light/style.css')}}">
    <!-- endinject -->
    <!-- Favicons -->
    <link href="{{asset('assets/img/imudu_icon.svg')}}" rel="icon">
    <link href="{{asset('assets/img/imudu_icon.svg')}}" rel="apple-touch-icon">
</head>
<body>
<div class="container-scroller">
    @include('layouts.dashboard.navbar')
    <div class="row mt-5">
        <div class="col-md-8 offset-md-2 mb-4 mb-xl-0 ">
            @include('layouts.dashboard.alerts')
            <div class="row mt-5">
                <div class="col-md-12 grid-margin text-center" >

                    <h3 class="font-weight-bold">Ongeza biashara</h3>

                </div>
            </div>
            <div class="col-md-12 grid-margin transparent">

                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-baseline">
                                <p class="card-title">Taarifa za biashara</p>
                                <a href="{{route('owner.businesses.edit', session()->get('business')->id)}}" class="btn btn-sm btn-outline-primary">Hariri</a>
                            </div>
                            <hr>
                            <div class="row  d-flex align-items-center justify-content-center flex-column">
                                <p class="text-muted">Jina la biashara</p>
                                <h3 class="text-primary fs-20 font-weight-medium">{{session()->get('business')->name}}</h3>
                            </div>
                            <hr>
                            <div class="row d-flex align-items-center justify-content-center mt-3 ">
                                <div class="col-md-4 text-center">
                                    <p class="text-muted">Kundi</p>
                                    <h3 class="text-primary fs-20 font-weight-medium">{{session()->get('business')->category->name}}</h3>
                                </div>
                                <div class="col-md-4 text-center">
                                    <p class="text-muted">Aina ya mauzo</p>
                                    <h3 class="text-primary fs-20 font-weight-medium">
                                        @if(session()->get('business')->sales_type == "Services")
                                            Huduma Pekee
                                        @elseif(session()->get('business')->sales_type == "Items")
                                            Bidhaa Pekee
                                        @else
                                            Bidhaa na huduma
                                        @endif
                                    </h3>
                                </div>
                                <div class="col-md-4 text-center">
                                    <p class="text-muted">Aina ya rekodi</p>
                                    <h3 class="text-primary fs-20 font-weight-medium">
                                        @if(session()->get('business')->record_type == "Each")
                                            Kila bidhaa
                                        @else
                                            Jumla pekee
                                        @endif
                                    </h3>
                                </div>
                            </div>
                            <hr>
                            <div class="row d-flex align-items-center justify-content-center mt-3 ">
                                <div class="col-md-4 text-center">
                                    <p class="text-muted">Mikopo</p>
                                    <h3 class="text-primary fs-20 font-weight-medium">
                                        @if(session()->get('business')->credit_allowed == "Yes")
                                            Inaruhusiwa
                                        @else
                                            Hairuhusiwi
                                        @endif
                                    </h3>
                                </div>
                                <div class="col-md-4 text-center">
                                    <p class="text-muted">Kata - Mkoa </p>
                                    <h3 class="text-primary fs-20 font-weight-medium">{{session()->get('business')->ward_region ?? '-'}}</h3>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>

            </div>
        </div>

</div>
<!-- container-scroller -->
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
    <script>

        document.getElementById('record_type').addEventListener('change', showMedform)
        function showMedform(){
            if(document.getElementById('record_type').value === "Each"){
                document.getElementById('stock').className = "form-group d-block"
            }else{
                document.getElementById('stock').className = "form-group d-none"
                document.getElementById('stock').value = ""
            }
        }
    </script>
<!-- End custom js for this page-->
</body>
