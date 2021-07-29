@extends('layouts.dashboard.main')
@section('title')
    Vifurushi - Admin
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin " >
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Vifurushi</h3>
                </div>

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('admin.plans.create')}}" class="btn btn-info">Ongeza Kifurushi kipya</a>
                            <div class="table-responsive">
                                <table class="table table-striped text-center">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Jina</th>
                                        <th>Biashara #</th>
                                        <th>Watumiaji #</th>
                                        <th>Bei (Tzs)</th>
                                        <th>Vitendo</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($plans as $plan)
                                    <tr>
                                        <td>
                                           {{$loop->iteration}}
                                        </td>
                                        <td>
                                            {{$plan->name}}
                                        </td>
                                        <td>
                                            {{$plan->no_of_businesses}}
                                        </td>

                                        <td>
                                            {{$plan->no_of_users}}
                                        </td>
                                        <td>
                                            {{number_format($plan->price)}} / <small>{{$plan->period}}</small>
                                        </td>
                                        <td>
                                           <div class="text-center">
                                               <a href="{{route('admin.plans.show', $plan)}}" class="text-success" data-bs-toggle="tooltip" data-placement="bottom" title="Angalia">
                                                   <i class="fas fa-eye"></i>
                                               </a>
                                               <a href="{{route('admin.plans.edit', $plan)}}" class="text-primary" data-bs-toggle="tooltip" data-placement="top" title="Badilisha">
                                                   <i class="fas fa-edit px-2"></i>
                                               </a>
                                               <a class="text-danger" data-bs-toggle="tooltip" data-placement="bottom" title="Futa" data-toggle="modal" data-target="#deleteBusinessModal">
                                                   <i class="fas fa-trash"></i>
                                                   <form action="{{route('admin.plans.destroy', $plan)}}" id="deletePlanForm" method="post">
                                                       @method('DELETE')
                                                       @csrf
                                                   </form>
                                               </a>
                                           </div>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr><td>No Businesses registered yet!</td></tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#deleteBusinessModal').on('show', function(e) {
            var link     = e.relatedTarget(),
                modal    = $(this),
                name = link.data("name");
            modal.find("#name").val(name);
        });
    </script>
@endsection
