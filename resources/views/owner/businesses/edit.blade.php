@extends('layouts.dashboard.main')
@section('title')
    Hariri taarifa za biashara
@endsection

@section('content')
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Hariri taarifa binafsi</h4>
                    <form class="forms-sample" action="{{route('owner.businesses.update', $business->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                       <div class="row">
                           <div class="form-group col-md-6">
                               <label for="Name">Jina la biashara</label>
                               <input type="text" class="form-control @error(old('name')) is-invalid @enderror" name="name" value="{{old('name') ?? $business->name ?? ''}}" id="name">
                               @error('name')
                               <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                           </div>

                           <div class="form-group col-md-6">
                               <label for="Credit allowed">Huwa unauza/kununua kwa mkopo?</label> <br>
                               <div class="ml-4">
                                   <div class="form-check">
                                       <input class="form-check-input " type="radio" name="credit_allowed" id="credit_allowed" value="Yes" @if(old('credit_allowed') == "Yes" || $business->credit_allowed == "Yes") checked @endif>
                                       <label class="form-check-label" for="credit_allowed">
                                           Ndio
                                       </label>
                                   </div>
                                   <div class="form-check">
                                       <input class="form-check-input" type="radio" name="credit_allowed" id="credit_allowed" value="No" @if(old('credit_allowed') == "No" || $business->credit_allowed == "No") checked @endif>
                                       <label class="form-check-label" for="credit_allowed">
                                           Hapana
                                       </label>
                                   </div>
                               </div>
                               @error('credit_allowed')
                               <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                           </div>
                       </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="Id type">Aina ya kitambulisho</label>
                                <select class="form-control" style="@error('id_type') border: 1px solid red; @enderror"   name="id_type" id="id_type">
                                    <option @if($business->id_type == "") selected @endif disabled>Chagua</option>
                                    <option value="License" @if(($business->id_type == "License")) @elseif (old('id_type') == "License") selected @endif>Lesseni ya biashara </option>
                                    <option value="Entrepreneur" @if(($business->id_type == "Entrepreneur")) @elseif (old('id_type') == "Entrepreneur") selected @endif>Wajasiriamali wadogo</option>
                                    <option value="TIN" @if(($business->id_type == "TIN")) @elseif (old('id_type') == "TIN") selected @endif>TIN namba ya biashara</option>
                                </select>
                                @error('id_type')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ID Number">Namba ya kitambulisho</label>
                                <input type="text" class="form-control @error(old('id_number')) is-invalid @enderror" name="id_number" value="{{old('id_number') ?? $owner->id_number ?? ''}}" id="id_number">
                                @error('id_number')
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-4">
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
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Hifadhi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
