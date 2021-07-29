@extends('layouts.dashboard.main')

@section('title')
    Ongeza bidhaa - Mmiliki
@endsection

@section('content-title')
    Ongeza bidhaa
@endsection

@section('content-subtitle')
    Karibu! Ongeza bidhaa unazoziuza sasa
@endsection

@section('content')

<div class="row ">
    <div class="col-md-8 grid-margin stretch-card offset-md-2">
        <div class="card">
            <div class="card-body">
               <form class="forms-sample" method="POST" action="{{route('owner.items.store')}}">
                   @csrf
                    <div class="form-group">
                        <label for="name">Jina la bidhaa:</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="unit_id">Kipimo kikubwa:</label>
                            <select  class="form-control @error('unit_id') is-invalid @enderror" id="unit_id" name="unit_id">
                                <option disabled selected>Chagua</option>
                                @forelse($bigUnits as $bigUnit)
                                    <option value="{{$bigUnit->id}}" @if(old('unit_id') == $bigUnit->id) selected @endif>{{$bigUnit->name}}</option>
                                @empty
                                    <option disabled>...</option>
                                @endforelse
                            </select>
                            @error('unit_id')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                       </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="unit_id">Bei ya jumla:</label>
                            <div class="input-group">
                                <input type="text" class="form-control " id="unit_price" name="unit_price" value="{{old('unit_price')}}">

                                <div class="input-group-append">
                                    <span class="input-group-text">TZS</span>
                                </div>
                            </div>
                            @error('unit_price')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                               </span>
                            @enderror

                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="mini_unit_id">Kipimo kidogo</label>
                            <select  class="form-control @error('mini_unit_id') is-invalid @enderror" id="mini_unit_id" name="mini_unit_id">
                                <option disabled selected>Chagua</option>
                                @forelse($smallUnits as $smallUnit)
                                    <option value="{{$smallUnit->id}}">{{$smallUnit->name}}</option>
                                @empty
                                    <option disabled>...</option>
                                @endforelse
                            </select>
                            @error('mini_unit_id')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                       </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mini_unit_id">Bei ya rejareja:</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('mini_unit_price') is-invalid @enderror" id="mini_unit_price" name="mini_unit_price" value="{{old('mini_unit_price')}}">

                                <div class="input-group-append">
                                    <span class="input-group-text">TZS</span>
                                </div>

                                @error('mini_unit_price')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                           </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                   <div class="form-group">
                       <label for="mini_unit_in_unit">Idadi ya kipimo kidogo kwenye kipimo kikubwa</label>
                       <input type="number" class="form-control @error('mini_unit_in_unit') is-invalid @enderror" id="mini_unit_in_unit" name="mini_unit_in_unit" value="{{old('mini_unit_in_unit')}}" placeholder="Mfano: Idadi ya chupa kwenye kreti la soda ">
                       @error('mini_unit_in_unit')
                       <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                   </div>
                   <div class="col-md-12">
                       <label class="col-form-label">Kipimo kidogo kinaweza kugawanyika zaidi? Mfano Robo, Nusu, Robo Tatu</label>
                       <div class="row ml-md-3 mb-3">
                           <div class="col-md-6">
                               <div class="form-check @error('divisible_further') is-invalid @enderror">
                                   <label class="form-check-label">
                                       <input type="radio" class="form-check-input" id="divisible_further" name="divisible_further" value="1" @if(old('divisible_further') == 1) checked @endif>
                                       Ndio
                                   </label>
                               </div>
                           </div>
                           <div class="col-md-6">
                               <div class="form-check">
                                   <label class="form-check-label">
                                       <input type="radio" class="form-check-input" id="divisible_further" name="divisible_further" value="0" @if(old('divisible_further') == 0) checked @endif>
                                       Hapana
                                   </label>
                               </div>
                           </div>
                       </div>
                       @error('divisible_further')
                       <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                   </div>
                   @if(session()->get('business')->stock_taking == 1)
                      <div class="form-group">
                       <label for="exampleInputUsername1" class="font-weight-bold">Idadi ya bidhaa zilizopo sasa</label>
                       <div class="row">
                           <div class="col-md-6">
                               <label for="unit_quantity">Idadi ya Kipimo Kikubwa </label>
                               <input type="number" class="form-control @error('unit_quantity') is-invalid @enderror" id="unit_quantity" name="unit_quantity" value="{{old('unit_quantity')}}">
                               @error('unit_quantity')
                               <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                               </span>
                               @enderror
                           </div>
                           <div class="col-md-6">
                               <label for="mini_unit_quantity">Idadi ya kipimo kidogo</label>
                               <input type="number" class="form-control @error('mini_unit_quantity') is-invalid @enderror" id="mini_unit_quantity" name="mini_unit_quantity" value="{{old('mini_unit_quantity')}}" >
                               @error('mini_unit_quantity')
                               <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                               @enderror
                           </div>

                       </div>

                   </div>
                   @endif

                    <button type="submit" class="btn btn-primary mr-2">Hifadhi bidhaa</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
