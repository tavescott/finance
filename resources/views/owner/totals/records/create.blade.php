@extends('layouts.dashboard.main')
@section('title')
    Rekodi - Mmiliki
@endsection

@section('content')
    <div class="row ">
        <div class="col-md-8 grid-margin stretch-card offset-md-2">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{route('owner.records.store')}}">
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
                            <label for="customer">Jumla ya Mauzo</label>
                            <input type="number" class="form-control @error('sales') is-invalid @enderror" id="sales" name="sales" value="{{old('sales')}}">
                            @error('sales')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="customer">Jumla ya Manunuzi</label>
                            <input type="number" class="form-control @error('purchases') is-invalid @enderror" id="purchases" name="purchases" value="{{old('purchases')}}">
                            @error('purchases')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="customer">Jumla ya Matumizi</label>
                            <input type="number" class="form-control @error('expenses') is-invalid @enderror" id="expenses" name="expenses" value="{{old('expenses')}}">
                            @error('expenses')
                            <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        @if(session()->get('business')->credit_allowed == "Yes")

                            <div class="form-group">
                                <label for="customer">Jumla ya Wadaiwa</label>
                                <input type="number" class="form-control @error('debtors') is-invalid @enderror" id="debtors" name="debtors" value="{{old('debtors')}}">
                                @error('debtors')
                                <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="customer">Jumla ya Wadai</label>
                                <input type="number" class="form-control @error('creditors') is-invalid @enderror" id="creditors" name="creditors" value="{{old('creditors')}}">
                                @error('creditors')
                                <span class="invalid-feedback" role="alert">
                               <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                        @endif

                        <button type="submit" class="btn btn-primary mr-2">Hifadhi rekodi</button>
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
