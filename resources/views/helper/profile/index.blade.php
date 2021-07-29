@extends('layouts.dashboard.main')
@section('title')
    Akaunti yangu - Mmiliki
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <p class="card-title">Taarifa binafsi</p>
                        <a href="{{route('owner.profile.edit', auth()->user()->owner->id)}}" class="btn btn-sm btn-outline-primary">Hariri</a>
                    </div>
                    <div class="row d-flex align-items-center justify-content-center">
                        <div class="col-md-3  text-center " >
                            <img src="{{asset('auth/images/faces/face22.jpg')}}" class="rounded-circle border border-success rounded-circle" alt="profile"/>
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
                                <li>0{{auth()->user()->owner->phone_2 ?? " - "}}</li>
                            </ul>
                        </div>
                        <div class="col-md-6 text-center">
                            <p class="text-muted">Barua Pepe</p>
                            <ul class="text-primary font-weight-bold text-left">
                                <li>{{auth()->user()->email}}</li>
                                <li>{{auth()->user()->owner->email_2 ?? " - "}}</li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="row d-flex align-items-center justify-content-center mt-3 ">
                        <div class="col-md-4 text-center">
                            <p class="text-muted">Aina ya kitambulisho</p>
                            <h3 class="text-primary fs-20 font-weight-medium">{{auth()->user()->owner->id_type ?? " - "}}</h3>
                        </div>
                        <div class="col-md-4 text-center">
                            <p class="text-muted">Namba ya kitambulisho</p>
                            <h3 class="text-primary fs-20 font-weight-medium">{{auth()->user()->owner->id_number ?? " - "}}</h3>
                        </div>
                        <div class="col-md-4 text-center">
                            <p class="text-muted">Kitambulisho</p>
                            <h3 class="text-primary fs-20 font-weight-medium">{{auth()->user()->owner->middle_name ?? " - "}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin stretch-card">
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
                    <div class="row d-flex align-items-center justify-content-center mt-3 ">
                        <div class="col-md-4 text-center">
                            <p class="text-muted">Aina ya kitambulisho</p>
                            <h3 class="text-primary fs-20 font-weight-medium">{{session()->get('business')->id_type ?? " - "}}</h3>
                        </div>
                        <div class="col-md-4 text-center">
                            <p class="text-muted">Namba ya kitambulisho</p>
                            <h3 class="text-primary fs-20 font-weight-medium">{{session()->get('business')->id_number ?? " - "}}</h3>
                        </div>
                        <div class="col-md-4 text-center">
                            <p class="text-muted">Kitambulisho</p>
                            <a href="#" class="btn btn-sm btn-primary">Angalia</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
