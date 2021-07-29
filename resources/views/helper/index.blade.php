@extends('layouts.dashboard.main')
@section('title')
    Dashbodi - Mmiliki
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin " >
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Karibu Msaidiziwe</h3>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin transparent">
            <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-tale">
                        <div class="card-body text-centercr">
                            <p class="mb-4">Tuambie kuhusu mfumo wetu</p>
                            <a class="btn btn-primary fs-30 mb-2" href="{{route('owner.testimonials.create')}}">Shuhudia</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
