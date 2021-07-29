@extends('layouts.auth.login')
@section('title')
    Badili neno la siri
@endsection
@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <h4 class="text-center">Badili neno la siri</h4>

        <form class="pt-3" method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}"
                       required autocomplete="email" autofocus placeholder="Barua Pepe">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <input id="password" type="password" class="form-control  form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Neno la siri jipya">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group ">
                <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password" placeholder="Thibitisha neno la siri">
            </div>

            <div class="mt-3">
                <button class="btn btn-block btn-primary font-weight-medium auth-form-btn" type="submit">Badili</button>
            </div>

            <div class="d-flex justify-content-between mt-4 font-weight-light border-top border-secondary">
                <a href="{{route('register')}}" class="text-primary mt-3">Jisajili</a>
                <a href="{{route('login')}}" class="text-primary mt-3">Ingia</a>
            </div>
        </form>
    </div>

@endsection
