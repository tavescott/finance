@extends('layouts.auth.login')
@section('title')
    Malizia taarifa za awali
@endsection
@section('content')
     <div class="text-center m-4">
         <h4>Malizia Taarifa za awali</h4>
     </div>
     <h5 class="text-primary">1. Taarifa za Mmiliki</h5>

     <form action="{{route('owner.preliminary.personal.post')}}" method="POST">
         @csrf
         <div class="form-group">
             <label for="Business Name">Jina la Kwanza: <sup class="text-danger">*</sup></label>
             <input type="text" name="first_name" id="first_name" value="{{old('first_name')}}" class="form-control @error('first_name') is-invalid @enderror" placeholder="Jina La kwanza">
             @error('first_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
         </div>

         <div class="form-group">
             <label for="Business Name">Jina la Mwisho: <sup class="text-danger">*</sup></label>
             <input type="text" name="last_name" id="last_name" value="{{old('last_name')}}" class="form-control @error('last_name') is-invalid @enderror" placeholder="Jina La Mwisho">
             @error('last_name')
             <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
         </div>

         <div class="form-group">
             <label for="Business Plan">Kifurushi: <sup class="text-danger">*</sup></label>

             <select name="plan_id" id="plan_id" class="form-control @error('plan_id') is-invalid @enderror">
                 <option disabled selected>Chagua...</option>
                 @forelse($plans as $plan)
                     <option value="{{$plan->id}}" @if(old('plan_id') == $plan->id) selected @endif>
                         {{$plan->name}} : {{number_format($plan->price)}} TZS / {{$plan->period}}
                     </option>
                 @empty
                     <option disabled>Hakuna kundi bado</option>
                 @endforelse
             </select>
             @error('plan_id')
             <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
         </div>

         <div class="mt-3">
             <button class="btn btn-block btn-primary font-weight-medium auth-form-btn" type="submit">Hifadhi</button>
         </div>
     </form>
@endsection
