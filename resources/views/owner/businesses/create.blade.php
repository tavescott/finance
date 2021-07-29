<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ongeza biashara - Imudu</title>
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

                    <form action="{{route('owner.preliminary.business.post')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="Business Name">Jina la Biashara: <sup class="text-danger">*</sup></label>
                            <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" placeholder="Jina">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Business Category">Kundi la Biashara: <sup class="text-danger">*</sup></label>

                            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                <option disabled selected>Chagua...</option>
                                @forelse($categories as $category)
                                    <option value="{{$category->id}}" @if(old('category_id') == $category->id) selected @endif>{{$category->name}}</option>
                                @empty
                                    <option disabled>Hakuna kundi bado</option>
                                @endforelse
                            </select>
                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Sales Type">Huwa unauza <sup class="text-danger">*</sup></label>

                            <select name="sales_type" id="sales_type" class="form-control @error('sales_type') is-invalid @enderror">
                                <option disabled selected>Chagua...</option>
                                <option value="Items" @if(old('sales_type') == "Items") selected @endif>Bidhaa pekee</option>
                                <option value="Services" @if(old('sales_type') == "Services") selected @endif>Huduma pekee</option>
                                <option value="Both" @if(old('sales_type') == "Both") selected @endif>Bidhaa na Huduma</option>

                            </select>
                            @error('sales_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Record Type">Huwa unarekodi: <sup class="text-danger">*</sup></label>

                            <select name="record_type" id="record_type" class="form-control @error('record_type') is-invalid @enderror">
                                <option disabled selected>Chagua...</option>
                                <option value="Each" @if(old('record_type') == "Each") selected @endif>Kila bidhaa/huduma ninayouza</option>
                                <option value="Total" @if(old('record_type') == "Total") selected @endif>Jumla ya mapato, manunuzi na matumizi</option>
                            </select>
                            @error('record_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group d-none" id="stock">
                            <label for="Credit allowed">Ungependa kurekodi bidhaa ulizonazo sasa?</label> <br>
                            <div class="ml-4">
                                <div class="form-check">
                                    <input class="form-check-input " type="radio" name="stock_taking" id="stock_taking" value="1" @if(old('stock_taking') == "1") checked @endif>
                                    <label class="form-check-label" for="stock_taking">
                                        Ndio, nataka kurekodi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="stock_taking" id="stock_taking" value="0" @if(old('stock_taking') == "0") checked @endif>
                                    <label class="form-check-label" for="stock_taking">
                                        Hapana, nitarekodi kuanzia manunuzi mapya
                                    </label>
                                </div>
                            </div>
                            @error('stock_taking')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Credit allowed">Huwa unauza/kununua kwa mkopo?</label> <br>
                            <div class="ml-4">
                                <div class="form-check">
                                    <input class="form-check-input " type="radio" name="credit_allowed" id="credit_allowed" value="Yes" @if(old('credit_allowed') == "Yes") checked @endif>
                                    <label class="form-check-label" for="credit_allowed">
                                        Ndio
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="credit_allowed" id="credit_allowed" value="No" @if(old('credit_allowed') == "No") checked @endif>
                                    <label class="form-check-label" for="credit_allowed">
                                        Hapana
                                    </label>
                                </div>
                            </div>
                            @error('credit_allowed')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-block btn-primary font-weight-medium auth-form-btn" type="submit">Hifadhi</button>
                        </div>
                    </form>
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
