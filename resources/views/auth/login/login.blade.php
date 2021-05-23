@extends('layouts.auth.login')

@section('title')
    Ingia
@endsection

@section('content')
    <h4 class="text-center">Habari! Karibu</h4>
    <h6 class="font-weight-light text-center">Ingia</h6>
    <form class="pt-3" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror"  value="{{ old('email') }}" placeholder="Barua Pepe">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Neno la siri">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mt-3">
            <button class="btn btn-block btn-primary font-weight-medium auth-form-btn" type="submit">Ingia</button>
        </div>
        @if (Route::has('password.request'))
            <div class="my-2 d-flex justify-content-end align-items-center">
                <a href="{{ route('password.request') }}" class="auth-link text-black">Umesahau neno la siri?</a>
            </div>
        @endif

        <div class="text-center mt-4 font-weight-light">
            Bado Hujajisajili? <a href="{{route('register')}}" class="text-primary">Jisajili sasa</a>
        </div>
    </form>
@endsection

