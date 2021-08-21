@extends('layouts.dashboard.out')
@section('title')
    Hariri taarifa binafsi
@endsection

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hariri taarifa binafsi</h4>
                    <form class="forms-sample" action="{{route('owner.profile.update', auth()->user()->owner->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                       <div class="row">
                           <div class="form-group col-md-4">
                               <label for="First Name">Jina la Kwanza</label>
                               <input type="text" class="form-control @error(old('first_name')) is-invalid @enderror" name="first_name" value="{{old('first_name') ?? $owner->first_name ?? ''}}" id="first_name">
                               @error('first_name')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                           </div>
                           <div class="form-group col-md-4">
                               <label for="Middle Name">Jina la Kati</label>
                               <input type="text" class="form-control @error(old('middle_name')) is-invalid @enderror" name="middle_name" value="{{old('middle_name') ?? $owner->middle_name ?? ''}}" id="middle_name">
                               @error('middle_name')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                           </div>
                           <div class="form-group col-md-4">
                               <label for="Last Name">Jina la Mwisho</label>
                               <input type="text" class="form-control @error(old('last_name')) is-invalid @enderror" name="last_name" value="{{old('last_name') ?? $owner->last_name ?? ''}}" id="last_name">
                               @error('last_name')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                           </div>
                       </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="Gender">Jinsia</label>
                                <select class="form-control @error(old('gender')) is-invalid @enderror" name = "gender" id="gender">
                                    <option disabled @if($owner->gender == "") selected @endif>Chagua</option>
                                    <option value="Ke" @if($owner->gender == "Ke") selected @elseif(old('gender') == "Ke") selected @endif>Ke</option>
                                    <option value="Me" @if($owner->gender == "Me") selected @elseif(old('gender') == "Me") selected @endif>Me</option>
                                </select>
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Birth Date">Tarehe ya kuzaliwa</label>
                                <input type="date" class="form-control @error(old('birth_date')) is-invalid @enderror" name="birth_date" value="{{old('birth_date') ?? $owner->birth_date ?? ''}}" id="birth_date">
                                @error('birth_date')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="Ward Region">Kata - Mkoa</label>
                                <input type="text" class="form-control @error(old('ward_region')) is-invalid @enderror" name="ward_region" value="{{old('ward_region') ?? $owner->ward_region ?? ''}}" id="ward_region">
                                @error('ward_region')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="Email">Barua Pepe</label>
                                <input type="email" class="form-control @error(old('email')) is-invalid @enderror" name="email" value="{{old('email') ?? auth()->user()->email ?? ''}}" id="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="Last Name">Namba ya simu</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" >+255</span>
                                    </div>
                                    <input type="number" class="form-control @error(old('phone')) is-invalid @enderror" name="phone" value="{{old('phone') ?? auth()->user()->phone ?? ''}}" id="phone">
                                </div>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Hifadhi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('components.profile')
@endsection
