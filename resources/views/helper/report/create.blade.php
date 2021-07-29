@extends('layouts.dashboard.main')

@section('title')
    Ripoti
@endsection

@section('content-subtitle')
<h3 class="text-center">{{$transactions['business']->name}}</h3>
<p class="text-center">Ripoti ya kifedha kama ilivyo {{$transactions['date']}}</p>
@endsection


@section('content')
    <div class="row ">
        <div class="col-md-8 grid-margin stretch-card offset-md-2">
            <div class="card">
                <div class="card-body p-0">
                    <ul class="nav nav-pills  mb-0 pb-0 border-0 pt-4 d-flex justify-content-center" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Kwa Kifupi</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Kwa kirefu</a>
                        </li>
                    </ul>
                    <div class="tab-content p-0 border-0" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            @include('owner.report.components.summary')
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            @include('owner.report.components.detail')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

