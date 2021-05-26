@extends('layouts.dashboard.main')

@section('title')
    Uza bidhaa - Mmiliki
@endsection

@section('content-title')
    Uza bidhaa
@endsection

@section('content-subtitle')
    Karibu! Rekodi bidhaa ulizouza/unazouza
@endsection

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="{{route('sales.create')}}" class="btn btn-info">Rekodi Mauzo</a>
                <a href="{{route('items.create')}}" class="btn btn-primary my-2">Ongeza bidhaa mpya</a>
                <p class="card-description text-center">
                   Mauzo ya leo:
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Bidhaa</th>
                            <th>Mnunuzi</th>
                            <th>Idadi</th>
                            <th>Jumla kuu(TZS)</th>
                            <th>Vitendo</th>
                        </tr>
                        </thead>
                        <tbody>
                       @forelse($sales as $sales)
                           <tr>
                               <td>{{$loop->iteration}}</td>
                               <td>{{$sales->item->name}}</td>
                               <td>{{$sales->customer}}</td>
                               <td>{{$sales->item->unit->name.": ".$sales->unit_quantity}} {{$sales->item->mini_unit->name.": ".$sales->mini_unit_quantity}}</td>
                               <td>{{number_format($sales->cash_amount + $sales->credit_amount)}}</td>
                               <td><a href="" class="btn btn-info">ona</a></td>
                           </tr>
                       @empty
                           <tr>
                               <td colspan="6">Huna Mauzo leo</td>
                           </tr>
                       @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
