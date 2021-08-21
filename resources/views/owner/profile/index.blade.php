@extends('layouts.dashboard.out')
@section('title')
    Akaunti yangu - Mmiliki
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <p class="card-title">Taarifa binafsi</p>
                        <a href="{{route('owner.profile.edit', auth()->user()->owner->id)}}" class="btn btn-sm btn-outline-primary">Hariri</a>
                    </div>
                    <div class="row d-flex align-items-center justify-content-center">
                        <div class="mt-3 col-md-3 col-sm-6 text-center">
                            @if(auth()->user()->image)
                                <img src="{{asset('images/profile_images/'.auth()->user()->image)}}" class="rounded-circle" alt="profile" height="100"/>
                            @else
                                <img src="{{asset('auth/images/avatar.svg')}}" alt="profile"/>
                            @endif
                        </div>
                        <div class="mt-3 col-md-3 col-sm-6 text-center">
                            <p class="text-muted">Jina la Kwanza</p>
                            <h3 class="text-primary fs-20 font-weight-medium">{{auth()->user()->owner->first_name}}</h3>
                        </div>
                        <div class="mt-3 col-md-3 col-sm-6 text-center">
                            <p class="text-muted">Jina la Kati</p>
                            <h3 class="text-primary fs-20 font-weight-medium">{{auth()->user()->owner->middle_name ?? " - "}}</h3>
                        </div>
                        <div class=" mt-3 col-md-3 col-sm-6 text-center">
                            <p class="text-muted">Jina la Mwisho</p>
                            <h3 class="text-primary fs-20 font-weight-medium">{{auth()->user()->owner->last_name}}</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="row d-flex align-items-center justify-content-center mt-3 ">
                        <div class="text-center col-md-4">
                            <p class="text-muted">Jinsia</p>
                            <h3 class="text-primary fs-20 font-weight-medium">{{auth()->user()->owner->gender ?? " - "}}</h3>
                        </div>
                        <div class="text-center col-md-4">
                            <p class="text-muted">Umri</p>
                            <h3 class="text-primary fs-20 font-weight-medium">{{ (date('Y') - date('Y', strtotime(auth()->user()->owner->birth_date)))  ?? " - "}}</h3>
                        </div>
                        <div class="text-center col-md-4">
                            <p class="text-muted">Kata - Mkoa</p>
                            <h3 class="text-primary fs-20 font-weight-medium">{{auth()->user()->owner->ward_region ?? " - "}}</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="row d-flex align-items-center justify-content-center mt-3 ">
                        <div class="col-md-6 text-center">
                            <p class="text-muted">Namba za simu</p>
                            <ul style="list-style: none; letter-spacing: 2px" class="text-primary font-weight-bold">
                                <li>0{{auth()->user()->phone}}</li>
                            </ul>
                        </div>
                        <div class="col-md-6 text-center">
                            <p class="text-muted">Barua Pepe</p>
                            <ul class="text-primary font-weight-bold">
                                <li>{{auth()->user()->email}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
