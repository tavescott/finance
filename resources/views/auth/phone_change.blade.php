@extends('layouts.auth.login')

@section('title')
    Badilisha namba ya simu
@endsection

@section('content')
    <h4 class="text-center">Badilisha namba ya simu</h4>

    <p>
       Namba ya zamani:
        <span class="font-weight-bold text-primary text-center">0{{auth()->user()->phone}}</span>
    </p>

    <form action="{{route('phone.change')}}" method="POST">
        @csrf
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" >+255</span>
                </div>
                <input type="tel" name="phone" class="form-control form-control-lg @error('phone') is-invalid @enderror"  value="{{ old('phone') }}" placeholder="Namba ya simu" />
            </div>
            @error('phone')
            <small class="text-danger font-weight-bold">{{ $message }}</small>
            @enderror
        </div>

        <div class="mt-3">
            <button class="btn btn-block btn-primary font-weight-medium auth-form-btn" type="submit">Thibitisha</button>
        </div>

    </form>

    <div class="text-center mt-3 font-weight-light">
        <p>Hujapata ujumbe? <a href="{{route('phone.resend')}}" class="text-primary">Tuma tena</a></p>
    </div>

@endsection
