@extends('layouts.dashboard.main')
@section('title')
    Dashbodi - Mmiliki
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin " >
            <div class="row">
                <div class="col-12 col-xl-12 mb-2 mb-xl-0">
                    <h3 class="font-weight-bold">Karibu
                        <span class="text-primary">
                            {{auth()->user()->owner->first_name. " ". auth()->user()->owner->last_name}} |
                            <small class="text-info">{{session()->get('business')->name}}</small>
                        </span>
                    </h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
                <div class="card data-icon-card-primary">
                    <div class="card-body">
                        <div class="row d-flex align-items-center">
                            <div class="col-8 text-white">
                                <p class="card-title text-white">Idadi ya bidhaa</p>

                                <p class="text-white font-weight-500 mb-0">Idadi ya bidhaa zote zinazouzwa na kunuliwa na biashara hii:</p>
                            </div>
                            <div class="col-4 ">
                       <span class="badge badge-info d-flex align-items-center justify-content-center">
                           <h3 class="px-2 pt-2">{{$items}}</h3>
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
                            <div class="col-12 text-white">
                                <p class="card-title text-white text-center">Idadi ya shughuli</p>
                                <div class="row">
                                    <div class="col-md-4 d-flex align-items-center flex-column justify-content-center">
                                        <span>Mauzo:</span>
                                        <span class="mt-2 p-2 badge badge-primary">{{$sales}}</span>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-center flex-column justify-content-center">
                                        <span>Manunuzi:</span>
                                        <span class="mt-2 p-2 badge badge-info">{{$purchases}}</span>
                                    </div>
                                    <div class="col-md-4 d-flex align-items-center flex-column  justify-content-center">
                                        <span>Matumizi:</span>
                                        <span class="mt-2 p-2 badge badge-warning">{{$expenses}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 stretch-card grid-margin grid-margin-md-0">
                <div class="card data-icon-card-primary">
                    <div class="card-body">
                        <div class="row d-flex align-items-center">
                            <div class="col-8 text-white d-flex align-items-center justify-content-center">
                                <p class="card-title text-white">Tuambie kuhusu mfumo wetu</p>
                            </div>
                            <div class="col-4 ">
                               <span class="badge badge-info d-flex align-items-center justify-content-center">
                                   <a class="text-white p-2" href="{{route('owner.testimonials.create')}}">Shuhudia</a>
                               </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
