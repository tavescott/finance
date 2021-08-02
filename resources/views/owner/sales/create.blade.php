@extends('layouts.dashboard.main')

@section('title')
    Rekodi mauzo - Mmiliki
@endsection

@section('content-title')
    Rekodi mauzo
@endsection

@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="row ">
        <div class="col-md-8 grid-margin stretch-card offset-md-2">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{route('owner.sales.store')}}">
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
                        <div class="form-group">
                            <label for="item_id">Chagua Bidhaa  / <a href="{{route('owner.items.create')}}">Ongeza Bidhaa</a></label>
                            <select class="form-control @error('item_id') is-invalid @enderror" id="item_id" name="item_id">
                                <option selected disabled>...</option>
                                @forelse($items as $item)
                                    <option value="{{$item->id}}" @if(old('item_id') == $item->id) selected @endif>{{$item->name}}</option>
                                @empty
                                    <option disabled>Hauna Bidhaa bado</option>
                                @endforelse
                            </select>
                            @error('item_id')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="customer">Mnunuzi</label>
                            <input type="text" class="form-control @error('customer') is-invalid @enderror" id="customer" name="customer" value="{{old('customer')}}">
                            @error('customer')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="quantity" class="font-weight-bold">Idadi ya bidhaa Ulizonunua</label>

                                    <div class="row">
                                        <div class="input-group col-md-6" id="unit_quantity">
                                            <input type="number" class="form-control @error('unit_quantity') is-invalid @enderror" id="unit_quantity" name="unit_quantity" value="{{old('unit_quantity')}}">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="u_quantity">...</span>
                                            </div>
                                            @error('unit_quantity')
                                            <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                         </span>
                                            @enderror
                                        </div>

                                        <div class="input-group col-md-6" id="mini_unit_quantity">
                                            <input type="number" class="form-control @error('mini_unit_quantity') is-invalid @enderror"  name="mini_unit_quantity" value="{{old('mini_unit_quantity')}}">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="mini_q">...</span>
                                            </div>
                                            @error('mini_unit_quantity')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>

                                    </div>
                                    <div class="form-group col-md-12 mt-3 " id="divisible_further">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Kipimo kidogo zaidi</span>
                                            </div>
                                            <select class="form-control @error('micro_unit_id') is-invalid @enderror" id="micro_unit_id" name="micro_unit_id">
                                                <option selected disabled>Chagua</option>
                                                @forelse($micro_units as $unit)
                                                    <option value="{{$unit->id}}" @if(old('micro_unit_id') == $unit->id) selected @endif>{{$unit->name}}</option>
                                                @empty
                                                    <option disabled>Hauna kipimo bado</option>
                                                @endforelse
                                            </select>
                                            @error('micro_unit_id')
                                            <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                             </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label for="quantity" class="font-weight-bold">Bei </label>
                                    <div class="input-group">

                                        <input type="number" class="form-control @error('cash_amount') is-invalid @enderror" id="cash_amount" name="cash_amount" value="{{old('cash_amount')}}">
                                        <div class="input-group-append" id="credit">
                                            <span class="input-group-text" >Tzs</span>
                                        </div>
                                    </div>
                                    @error('cash_amount')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                    @error('credit_amount')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Hifadhi mauzo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function (){
            $('#item_id').change(function (){
                if ($(this).val() != ''){
                    var id = $(this).val()
                    var _token = $('input[name="_token"]').val()
                    $.ajax({
                        url:"items/"+id,
                        method: "GET",
                        data: {id:id, _token:_token},
                        success:function (result){
                            $('#u_quantity').text(result.unit);
                            $('#mini_q').text(result.mini_unit);
                            if (result.divisible_further === 1) {
                                $('#divisible_further').addClass('d-block').removeClass('d-none');

                            }
                            else{
                                $('#divisible_further').addClass('d-none').removeClass('d-block');
                            }
                            $('#unit_quantity').change(function () {
                                $('.smal').text(result.unit_price * $(this).val() + result.mini_unit_price * $('#mini_unit_quantity').val())
                            })
                            $('#mini_unit_quantity').change(function () {
                                $('.smal').text(result.mini_unit_price * $(this).val() + result.unit_price * $('#unit_quantity').val())
                            })
                        }
                    })
                }
            });

            $('#payment_type').keyup(function () {
               var value = $(this).val()
                if (value != '') {
                    if (value === 'Cash') {
                        $('#credit').addClass('d-none');
                        $('#credit_amount').addClass('d-none');
                        $('#customer').removeAttr('required');
                        $('#cash').removeClass('d-none');
                        $('#cash_amount').removeClass('d-none');
                    } else if (value === 'Credit') {
                        $('#cash').addClass('d-none');
                        $('#cash_amount').addClass('d-none');
                        $('#customer').attr('required', 'true');
                        $('#credit').removeClass('d-none');
                        $('#credit_amount').removeClass('d-none');
                    } else if (value === 'Both') {
                        $('#cash').removeClass('d-none');
                        $('#cash_amount').removeClass('d-none');
                        $('#customer').attr('required', 'true');
                        $('#credit').removeClass('d-none');
                        $('#credit_amount').removeClass('d-none');
                    }
                }
            });
        });
    </script>
@endsection
