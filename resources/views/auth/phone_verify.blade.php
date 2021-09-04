@extends('layouts.auth.login')

@section('title')
    Thibitisha Namba ya simu
@endsection

@section('content')
    <h4 class="text-center">Thibitisha Namba ya simu</h4>

    <p>
        Kabla ya kuendelea, tafadhali thibitisha Namba yako ya simu  kwa kutumia namba ya uthibitisho iliotumwa kwenye namba:
        <span class="font-weight-bold text-primary text-center">0{{auth()->user()->phone}}</span>
    </p>

    <form action="{{route('phone.verification.post')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">Namba ya uthibitisho:</label>
            <input type="number" name="code" class="form-control form-control-lg @error('code') is-invalid @enderror"  value="{{ old('code') }}" placeholder="Namba ya uthibitisho">
            @error('code')
            <span class="invalid-feedback" role="alert">
                <strong >{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mt-3">
            <button class="btn btn-block btn-primary font-weight-medium auth-form-btn" type="submit">Thibitisha</button>
        </div>

    </form>

    <div class="text-center mt-3 font-weight-light">
        <p>Hujapata ujumbe? <a href="{{route('phone.resend')}}" class="text-primary">Tuma tena</a></p>
        <p class="mt-3">Umekosea namba ya simu? <a href="{{route('phone.change')}}" class="text-primary">Badilisha</a></p>
    </div>

@endsection
