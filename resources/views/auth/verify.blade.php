@extends('layouts.auth.login')

@section('title')
    Thibitisha Barua Pepe
@endsection

@section('content')
    <h4 class="text-center">Thibitisha barua pepe</h4>

    <p>
        Kabla ya kuendelea, tafadhali thibitisha barua pepe yako kwa kutumia kiungo (Link) au namba ya uthibitisho iliotumwa kwenye barua pepe ya:
        <span class="font-weight-bold text-primary">{{$mail}}</span>
    </p>
    <form action="{{route('verification.post')}}" method="POST">
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
    <div class="text-center mt-4 font-weight-light">
        Hujapata ujumbe? <a href="{{route('register')}}" class="text-primary">Tuma tena</a>
        <p class="mt-3">Umekosea barua pepe? <a href="{{route('register')}}" class="text-primary">Badilisha</a></p>
    </div>

@endsection
