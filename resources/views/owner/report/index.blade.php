@extends('layouts.dashboard.main')

@section('title')
    Ripoti |
@endsection

@section('content-title')
    Ripoti
@endsection

@section('content')
    <h4 class="text-center text-secondary">Ripoti za muda mfupi</h4>
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

            <h4 class="text-secondary text-center">Ripoti za muda maalum</h4>

            <div class="card-deck col-md-12 mb-4">

                <div class="card border-bottom border-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1">Kuanzia:</span>
                                    </div>
                                    <input type="date" name="" id="" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1">Mpaka:</span>
                                    </div>
                                    <input type="date" name="" id="" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-success w-100">Angalia</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col mb-4">
                <div class="card border-bottom border-success">
                    <div class="img d-flex justify-content-center text-success"><i class="fas fa-calendar-week p-3 fa-xl fa-4x"></i></div>
                    <div class="card-body">
                        <h5 class="card-title text-success">Ripoti ya wiki</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card border-bottom border-danger">
                    <div class="img d-flex justify-content-center text-danger"><i class="fas fa-calendar-alt p-3 fa-4x"></i></div>
                    <div class="card-body">
                        <h5 class="card-title text-danger">Ripoti ya mwezi</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-deck">
            <div class="card border border-success">
                <div class="card-body">
                    <h5 class="card-title text-secondary ">Miezi Mitatu</h5>
                    <a href="#" class="btn btn-info btn-sm">Angalia</a>
                </div>
            </div>
            <div class="card border border-success">
                <div class="card-body">
                    <h5 class="card-title text-secondary ">Miezi Sita</h5>
                    <a href="#" class="btn btn-info btn-sm">Angalia</a>
                </div>
            </div>
            <div class="card border border-success">
                <div class="card-body">
                    <h5 class="card-title text-secondary ">Miezi Tisa</h5>
                    <a href="#" class="btn btn-info btn-sm">Angalia</a>
                </div>
            </div>
            <div class="card border border-success">
                <div class="card-body">
                    <h5 class="card-title text-secondary ">Mwaka</h5>
                    <a href="#" class="btn btn-info btn-sm">Angalia</a>
                </div>
            </div>
        </div>
    </div>

@endsection
