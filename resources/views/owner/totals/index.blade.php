@extends('layouts.dashboard.main')
@section('title')
    Dashbodi - Mmiliki
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin " >
            <div class="row">
                <div class="col-12 col-xl-12 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold"> Karibu
                        <span class="text-primary">
                            {{auth()->user()->owner->first_name. " ". auth()->user()->owner->last_name}} |
                            <small class="text-info">{{session()->get('business')->name}}</small>
                        </span>
                    </h3>
                </div>
            </div>
        </div>
    </div>
@endsection
