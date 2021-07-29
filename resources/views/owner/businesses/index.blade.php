<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Biashara zangu - Imudu</title>
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
            <div class="row mt-5">
                @include('layouts.dashboard.alerts')
                <div class="col-md-12 grid-margin text-center" >

                    <h3 class="font-weight-bold">Karibu {{auth()->user()->owner->first_name.' '.auth()->user()->owner->last_name ?? 'Mmiliki'}}</h3>
                    <h6 class="font-weight-normal mt-3">Mudu biashara zako zote sehemu moja. Una biashara: <span>{{$businesses->count() ?? 0}} / {{auth()->user()->owner->plan->no_of_businesses}}</span></h6>

                </div>
            </div>
            <div class="col-md-12 grid-margin transparent">
                <div class="row">
                    @forelse($businesses as $business)
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    <div class="mb-4 d-flex justify-content-between align-items-center">
                                        <div class="badge badge-info border border-light">{{$loop->iteration}}</div>
                                        <div class="badge badge-outline-light">
                                            <a href="{{route('owner.businesses.show', $business)}}" class="badge badge-info" data-toggle="tooltip" data-placement="top" title="Angalia"><i class="fas fa-eye"></i></a>
                                            <a href="{{route('owner.businesses.edit', $business)}}" class="badge badge-success" data-toggle="tooltip" data-placement="top" title="Badili"><i class="fas fa-edit"></i></a>
                                            <a class="badge badge-danger" data-bs-toggle="tooltip" data-placement="bottom" title="Futa" data-toggle="modal" data-target="#deleteBusinessModal">
                                                <i class="fas fa-trash-alt"></i>
                                                <form action="{{ route('owner.businesses.destroy', $business) }}" id="deleteBusinessForm" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                </form>
                                            </a>
                                        </div>
                                    </div>
                                    <p class="fs-30 my-4 text-center">{{$business->name}}</p>
                                    <a href="{{route('owner.business.id', $business->id)}}" class="btn btn-info w-100">Chagua</a>
                                </div>
                            </div>
                        </div>
                    @empty

                    @endforelse

                    @if(auth()->user()->owner->plan->id == 3 && auth()->user()->owner->plan->no_of_businesses == $businesses->count())
                        @else
                            <div class="col-md-6 mb-4 stretch-card transparent">
                                <div class="card card-inverse-light border border-primary">
                                    <div class="card-body ">
                                        <div class="text-center">
                                            <p class="">Ongeza biashara</p>
                                            <a href="{{route('owner.businesses.create')}}" class="fa-6x"><i class="fas fa-plus-circle text-primary"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if(auth()->user()->owner->plan->id != 3)
                                <section id="cta" class="bg-primary rounded mb-2 text-light w-100">
                                    <div class="container p-4" data-aos="zoom-in">
                                        <div class="text-center">
                                            <h3>Ongeza kifurushi</h3>
                                            <p>Ongeza kifurushi chako sasa uweze kumudu biashara nyingi zaidi pamoja na faida nyingine kem kem</p>
                                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#upgradePlanModal">Ongeza kifurushi</a>
                                        </div>
                                    </div>
                                </section>
                            @endif


                    @endif
                </div>

        </div>
            @include('layouts.dashboard.footer')
    </div>

</div>
    <div class="modal fade" id="upgradePlanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="{{route('owner.change.plan')}}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Badilisha Kifurushi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Business Plan">Kifurushi: <sup class="text-danger">*</sup></label>
                            <select name="plan_id" id="plan_id" class="form-control @error('plan_id') is-invalid @enderror">
                                <option disabled selected>Chagua...</option>
                                @forelse($plans as $plan)
                                    <option value="{{$plan->id}}" @if(old('plan_id') == $plan->id) selected @endif @if(auth()->user()->owner->plan->id == $plan->id) disabled @endif>
                                        {{$plan->name}} : {{number_format($plan->price)}} TZS / {{$plan->period}}
                                    </option>
                                @empty
                                    <option disabled>Hakuna kundi bado</option>
                                @endforelse
                            </select>
                            @error('plan_id')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                       <p>Taarifa za vifurushi</p>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kifurushi</th>
                                        <th>Biashara</th>
                                        <th>Wafanyakazi</th>
                                        <th>SMS</th>
                                        <th>Bei</th>
                                        <th>Kwa (muda)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($plans as $plan)
                                        <tr class="@if($plan->id == auth()->user()->owner->plan->id) table-secondary @endif " id="plan-{{$plan->id}}">
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$plan->name}}</td>
                                            <td>{{$plan->no_of_businesses}}</td>
                                            <td>{{$plan->no_of_users}}</td>
                                            <td>
                                                @if($plan->id == 1)
                                                    <i class="fas fa-times text-danger"></i>
                                                @else
                                                    <i class="fas fa-check text-success"></i>
                                                @endif
                                            </td>
                                            <td>{{number_format($plan->price)}}</td>
                                            <td>{{$plan->period}}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>Hakuna vifurushi kwa sasa!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            <p class="mt-2 text-center">
                                <span class="badge badge-secondary">Cha sasa</span>
                                <span class="badge badge-success">Kipya</span>
                            </p>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Badilisha</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteBusinessModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Futa Biashara: <span id="deletedBusinessName" class="text-primary"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Una uhakika unataka kuifuta hii biashara kwenye mfumo? Utafuta taarifa, bidhaa, mauzo, ripoti, matumizi, mipangilio, manunuzi pamoja na chochote kinachohusiana na biashara hii.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hapana, usifute</button>
                    <a class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('deleteBusinessForm').submit();">
                        Ndio nina uhakika, ifute
                    </a>
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
        $(document).ready(function () {
            $('#plan_id').change(function () {
                $('#plan-'+$(this).val()).addClass('table-success');
            });
        });
    </script>
<!-- End custom js for this page-->
</body>
