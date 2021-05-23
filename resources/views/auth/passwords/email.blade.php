@extends('layouts.auth.login')
@section('title')
    Nimesahau neno la siri
@endsection
@section('content')
    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <h4 class="text-center">Umesahau Neno la siri?</h4>
        <h6 class="font-weight-light text-center">Usihofu. Ingiza barua pepe yako tutakutumia kiungo (link) uibadilishe</h6>

        <form class="pt-3" method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror"  value="{{ old('email') }}" placeholder="Barua Pepe">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mt-3">
                <button class="btn btn-block btn-primary font-weight-medium auth-form-btn" type="submit">Tuma</button>
            </div>
        </form>
    </div>
@endsection
