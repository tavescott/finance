@extends('layouts.dashboard.main')

@section('title')
    Rekodi Matumizi - Mmiliki
@endsection

@section('content-title')
    Rekodi Matumizi
@endsection

@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="row ">
        <div class="col-md-8 grid-margin stretch-card offset-md-2">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{route('owner.expenses.store')}}">
                        @csrf
                        <div class="col-md-12 d-flex justify-content-center align-items-baseline mb-4">
                            <label>Tarehe:</label>
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="date_show" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <i class="mdi mdi-calendar" ></i> Leo ({{date('d/m/Y')}})
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="date_show">
                                    <input type="date" class="form-control form-control-sm dropdown-item" name="date" value="{{old('date')}}" id="date">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="common_expense_id">Chagua Matumizi</label>
                                    <select class="form-control @error('common_expense_id') is-invalid @enderror" id="common_expense_id" name="common_expense_id">
                                        <option selected disabled>Chagua</option>
                                        @forelse($common_expenses as $common_expense)
                                            <option value="{{$common_expense->id}}" @if(old('common_expense_id') == $common_expense->id) selected @endif>{{$common_expense->name}}</option>
                                        @empty
                                            <option disabled>...</option>
                                        @endforelse
                                    </select>
                                    @error('common_expense_id')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Au Andika Jina la Matumizi</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <label for="amount">Bei</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{old('amount')}}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">TZS</span>
                                    </div>
                                    @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-6">

                              <div class="row">
                                  <div class="form-group col-md-4">
                                      <label for="unit_id">Kipindi</label>
                                      <select class="form-control @error('unit_id') is-invalid @enderror" id="unit_id" name="unit_id">
                                          <option selected disabled>...</option>
                                          @forelse($units as $unit)
                                              <option value="{{$unit->id}}" @if(old('item_id') == $unit->id) selected @endif>{{$unit->name}}</option>
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

                                  <div class="form-group col-md-4">
                                      <label for="name">Ngapi/Mingapi</label>
                                      <input type="number" class="form-control @error('multiplier') is-invalid @enderror" id="multiplier" name="multiplier" value="{{old('multiplier')}}">
                                      @error('multiplier')
                                      <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </span>
                                      @enderror
                                  </div>

                                  <div class="form-group col-md-4">
                                      <label for="number_of_days">Namba ya siku</label>
                                      <input type="number" class="form-control @error('number_of_days') is-invalid @enderror" id="number_of_days" name="number_of_days" value="{{old('number_of_days')}}">
                                      @error('number_of_days')
                                      <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                      </span>
                                      @enderror
                                  </div>
                              </div>

                            </div>

                        </div>

                       <div class="form-group">
                           <label for="description">Maelezo <small><i>(Sio ya lazima)</i></small></label>
                           <textarea name="description" id="description" cols="30" rows="5" class="form-control  @error('description') is-invalid @enderror" >{{old('description')}}</textarea>
                           @error('description')
                           <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                          </span>
                           @enderror
                       </div>

                        <button type="submit" class="btn btn-primary mr-2">Hifadhi Matumizi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function (){
            $('#date').change(function () {
                var date = $(this).val();
                $('#date_show').attr('value', date).text(date)
            });
        });
    </script>
@endsection
