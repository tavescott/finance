@extends('layouts.dashboard.main')
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
                            <div class="form-group col-md-3">
                                <label for="Email">Barua Pepe</label>
                                <input type="email" class="form-control @error(old('email')) is-invalid @enderror" name="email" value="{{old('email') ?? auth()->user()->email ?? ''}}" id="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="Middle Name">Barua pepe <sup>2</sup></label>
                                <input type="email" class="form-control @error(old('email_2')) is-invalid @enderror" name="email_2" value="{{old('email_2') ?? $owner->email_2 ?? ''}}" id="email_2">
                                @error('email_2')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="Last Name">Namba ya simu</label>
                                <input type="number" class="form-control @error(old('phone')) is-invalid @enderror" name="phone" value="0{{old('phone') ?? auth()->user()->phone ?? ''}}" id="phone">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="Last Name">Namba ya simu <sup>2</sup></label>
                                <input type="number" class="form-control @error(old('phone_2')) is-invalid @enderror" name="phone_2" value="0{{old('phone_2') ?? $owner->phone_2 ?? ''}}" id="phone_2">
                                @error('phone_2')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="Id type">Aina ya kitambulisho</label>
                                <select class="form-control" style="@error('id_type') border: 1px solid red; @enderror"   name="id_type" id="id_type">
                                    <option @if($owner->id_type == "") selected @endif disabled>Chagua</option>
                                    <option value="NIDA" @if(($owner->id_type == "NIDA")) @elseif (old('id_type') == "NIDA") selected @endif>Kitambulisho cha taifa (NIDA) </option>
                                    <option value="Voters" @if(($owner->id_type == "Voters")) @elseif (old('id_type') == "Voters") selected @endif>Kitambulisho cha mpiga kura</option>
                                    <option value="Driving" @if(($owner->id_type == "Driving")) @elseif (old('id_type') == "Driving") selected @endif>Lesseni ya udereva</option>
                                    <option value="TIN" @if(($owner->id_type == "TIN")) @elseif (old('id_type') == "TIN") selected @endif>TIN namba binafsi</option>
                                    <option value="Passport" @if(($owner->id_type == "Passport")) @elseif (old('id_type') == "Passport") selected @endif>Hati ya kusafiria</option>
                                </select>
                                @error('id_type')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label for="ID Number">Namba ya kitambulisho <sup>2</sup></label>
                                <input type="text" class="form-control @error(old('id_number')) is-invalid @enderror" name="id_number" value="{{old('id_number') ?? $owner->id_number ?? ''}}" id="id_number">
                                @error('id_number')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-3">
                                <label>Kitambulisho</label>
                                <input type="file" name="id_document_path" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Pakia Kitambulisho">
                                    <span class="input-group-append">
                                  <button class="file-upload-browse btn btn-primary" type="button">Pakia</button>
                                </span>
                                </div>
                                @error('id_document_path')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label>Picha</label>
                                <input type="file" name="image_path" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Pakia picha">
                                    <span class="input-group-append">
                                  <button class="file-upload-browse btn btn-primary" type="button">Pakia</button>
                                </span>
                                </div>
                                @error('id_document_path')
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
@endsection
