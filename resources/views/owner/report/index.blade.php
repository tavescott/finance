@extends('layouts.dashboard.main')

@section('title')
    Ripoti |
@endsection

@section('content-title')
    Ripoti
@endsection

@section('content')
    <div class="container col-md-8 mt-4 text-center">
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col mb-4">
                <div class="card border-bottom border-primary" >
                    <div class="img d-flex justify-content-center text-primary"><i class="fas fa-calendar-check p-3 fa-4x"></i></div>
                    <div class="card-body">
                        <h5 class="card-title text-primary">Ripoti ya leo</h5>
                        <p class="card-text">Pata ripoti ya leo tarehe <b>{{date('d/m/Y')}}.</b></p>
                        <a href="{{route('owner.today.report')}}" class="btn btn-success">Angalia</a>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card border-bottom border-info">
                    <div class="img d-flex justify-content-center text-info"><i class="fas fa-calendar-day p-3 fa-4x"></i></div>
                    <div class="card-body">
                        <h5 class="card-title text-info">Ripoti ya siku</h5>
                        <p class="card-text">Chagua tarehe yoyote upate ripoti yake</p>
                        <form action="{{route('owner.day.report')}}" method="POST">
                            <div class="row">
                                @csrf
                                <div class="col-md-7">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success text-white" id="basic-addon1">Chagua:</span>
                                        </div>
                                        <input type="date" name="date" id="date" value="{{old('date')}}" class="form-control form-control-sm @error('date') is-invalid @enderror">
                                        @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <button class="btn btn-success  w-100">Angalia</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-deck col-md-12 mb-4">

                <div class="card border-bottom border-info">
                    <div class="img d-flex justify-content-center text-info"><i class="fas fa-calendar-day p-3 fa-4x"></i></div>
                    <div class="card-body">
                        <form action="{{route('owner.interval.report')}}" method="POST">
                            <h5 class="card-title text-info">Ripoti ya muda maalum</h5>
                            <div class="row">
                                @csrf
                                <div class="col-md-5">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success text-white" id="basic-addon1">Kuanzia:</span>
                                        </div>
                                        <input type="date" name="from_date" value="{{old('from_date')}}" id="from_date" value="{{old('from_date')}}" class="form-control form-control-sm  @error('from_date') is-invalid @enderror"">

                                    </div>
                                    @error('from_date')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-success text-white" id="basic-addon1">Mpaka:</span>
                                        </div>
                                        <input type="date" name="to_date" value="{{old('to_date')}}" id="to_date" value="{{old('to_date')}}" class="form-control form-control-sm  @error('to_date') is-invalid @enderror"">

                                    </div>
                                    @error('to_date')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-success">Angalia</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
