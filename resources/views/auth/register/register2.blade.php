@extends('layouts.auth.login')

@section('title')
    Jisajili
@endsection

@section('content')
    <h4 class="text-center">Habari! Karibu</h4>
    <h6 class="font-weight-light text-center">Jisajili</h6>
    <form class="pt-3" method="POST" action="{{ route('register') }}">
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
            <input type="tel" name="phone" class="form-control form-control-lg @error('phone') is-invalid @enderror"  value="{{ old('phone') }}" placeholder="Namba ya simu" />
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Neno la siri" />
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <input type="password" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Thibitisha neno la siri" />
            @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mt-3">
            <button class="btn btn-block btn-primary font-weight-medium auth-form-btn" type="submit">Jisajili sasa</button>
        </div>


        <div class="text-center mt-4 font-weight-light">
            Tayari umejisajili? <a href="{{route('login')}}" class="text-primary">Ingia</a>
        </div>
    </form>
@endsection

