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

                    @include('owner.report.components.summary')

                </div>
            </div>
        </div>
    </div>
@endsection

