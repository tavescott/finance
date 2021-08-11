@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        {!! $chart->container() !!}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <script src="{{$chart->cdn()}}"></script>
        <script>
            {{ $chart->script() }}
        </script>
    @endsection
@endsection
