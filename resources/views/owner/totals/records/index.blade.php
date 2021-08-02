@extends('layouts.dashboard.main')
@section('title')
    Rekodi - Mmiliki
@endsection

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="{{route('owner.records.create')}}" class="btn btn-info">Rekodi sasa</a>
                <p class="card-description text-center">
                    Rekodi za wiki hii:
                </p>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th>Tarehe</th>
                            <th>Mauzo</th>
                            <th>Manunuzi</th>
                            <th>Matumuzi</th>
                            @if(session()->get('business')->credit_allowed == "Yes")
                                <th>Wadaiwa</th>
                                <th>Wadai</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($records as $record)
                            <tr>
                                <td>
                                    @if(empty($record->date))
                                        {{date('d/m/Y', strtotime($record->created_at))}}
                                    @else
                                        {{date('d/m/Y', strtotime($record->date))}}
                                    @endif
                                </td>
                                <td>{{number_format($record->sales)}}</td>
                                <td>{{number_format($record->purchases)}}</td>
                                <td>{{number_format($record->expenses)}}</td>
                                @if(session()->get('business')->credit_allowed == "Yes")
                                    <td>{{number_format($record->debtors)}}</td>
                                    <td>{{number_format($record->creditors)}}</td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Huna Rekodi bado</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        {!! $records->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
