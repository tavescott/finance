@extends('layouts.dashboard.main')

@section('title')
    Matumizi - Mmiliki
@endsection

@section('content-title')
    Matumizi
@endsection

@section('content-subtitle')
    Karibu! Rekodi matumizi yako ya kila siku
@endsection

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="{{route('expenses.create')}}" class="btn btn-info">Rekodi Matumizi</a>
                <p class="card-description text-center">
                   Matumizi ya leo:
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Jina</th>
                            <th>Muda</th>
                            <th>Jumla kuu(TZS)</th>
                            <th>Vitendo</th>
                        </tr>
                        </thead>
                        <tbody>
                       @forelse($expenses as $expense)
                           <tr>
                               <td>{{$loop->iteration}}</td>
                               <td>{{$expense->common_expense->name ?? $expense->name}}</td>
                               <td>{{$expense->unit->name}}: {{$expense->multiplier }} @if($expense->number_of_days != 0) Siku:{{$expense->number_of_days}}@endif</td>
                               <td>{{number_format($expense->amount)}}</td>
                               <td><a href="" class="btn btn-info">ona</a></td>
                           </tr>
                       @empty
                           <tr>
                               <td colspan="6">Huna Matumizi leo</td>
                           </tr>
                       @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
