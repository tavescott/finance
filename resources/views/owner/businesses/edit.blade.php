<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hariri biashara - Imudu</title>
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
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hariri taarifa binafsi</h4>
                    <form class="forms-sample" action="{{route('owner.businesses.update', $business->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                       <div class="row">
                           <div class="form-group col-md-12">
                               <label for="Name">Jina la biashara</label>
                               <input type="text" class="form-control @error(old('name')) is-invalid @enderror" name="name" value="{{old('name') ?? $business->name ?? ''}}" id="name">
                               @error('name')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                           </div>
                       </div>

                        <button type="submit" class="btn btn-primary mr-2">Hifadhi</button>
                    </form>
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
