@extends('layouts.dashboard.main')
@section('title')
    Dashbodi - Admin
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin " >
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Karibu Admin</h3>
                </div>
            </div>
        </div>
    </div>
<div class="row">
    <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
        <div class="card data-icon-card-primary">
            <div class="card-body">
                <div class="row d-flex align-items-center">
                    <div class="col-8 text-white">
                        <p class="card-title text-white">Idadi ya biashara</p>

                        <p class="text-white font-weight-500 mb-0">Idadi ya biashara zote zilizosajiliwa mpaka sasa:</p>
                    </div>
                    <div class="col-4 ">
                       <span class="badge badge-info d-flex align-items-center justify-content-center">
                           <h3 class="py-3">34040</h3>
                       </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
        <div class="card data-icon-card-success">
            <div class="card-body">
                <div class="row d-flex align-items-center">
                    <div class="col-8 text-white">
                        <p class="card-title text-white">Idadi ya watumiaji</p>

                        <p class="text-white font-weight-500 mb-0">Watumiaji wote wa mfumo mpaka sasa:</p>
                    </div>
                    <div class="col-4 ">
                       <span class="badge badge-primary">
                           <h3 class="py-3">34040</h3>
                       </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
        <div class="card data-icon-card-primary">
            <div class="card-body">
                <div class="row d-flex align-items-center">
                    <div class="col-8 text-white">
                        <p class="card-title text-white">Number of Businesses</p>

                        <p class="text-white font-weight-500 mb-0">The total number of active businesses registered to date:</p>
                    </div>
                    <div class="col-4 ">
                       <span class="badge badge-info d-flex align-items-center justify-content-center">
                           <h3 class="py-3">34040</h3>
                       </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
