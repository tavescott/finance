@extends('layouts.dashboard.main')

@section('title')
    Nunua bidhaa - Mmiliki
@endsection

@section('content-title')
    Nunua bidhaa
@endsection

@section('content-subtitle')
    Karibu! Rekodi bidhaa unazonunua sasa
@endsection

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="{{route('owner.purchases.create')}}" class="btn btn-info">Rekodi manunuzi</a>
                <a href="{{route('owner.items.create')}}" class="btn btn-primary my-2">Ongeza bidhaa mpya</a>
                <p class="card-description text-center">
                   Manunuzi ya leo:
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Bidhaa</th>
                            <th>Muuzaji</th>
                            <th>Idadi</th>
                            <th>Jumla kuu(TZS)</th>
                        </tr>
                        </thead>
                        <tbody>
                       @forelse($purchases as $purchase)
                           <tr>
                               <td>{{$purchase->id}}</td>
                               <td>{{$purchase->item->name}}</td>
                               <td>{{$purchase->supplier}}</td>
                               <td>{{$purchase->item->unit->name.": ".$purchase->unit_quantity}} {{$purchase->item->mini_unit->name.": ".$purchase->mini_unit_quantity}}</td>
                               <td>{{number_format($purchase->cash_amount + $purchase->credit_amount)}}</td>
                           </tr>
                       @empty
                           <tr>
                               <td colspan="6">Huna Manunuzi leo</td>
                           </tr>
                       @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
