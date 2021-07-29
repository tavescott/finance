@extends('layouts.dashboard.main')
@section('title')
    Biashara - Admin
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin " >
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Biashara</h3>
                </div>

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('admin.businesses.create')}}" class="btn btn-info">Ongeza biashara mpya</a>
                            <div class="table-responsive">
                                <table class="table table-striped text-center">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Jina</th>
                                        <th>Mmiliki</th>
                                        <th>Anuani</th>
                                        <th>Vitendo</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($businesses as $business)
                                    <tr>
                                        <td>
                                           {{$loop->iteration}}
                                        </td>
                                        <td>
                                            {{$business->name}}
                                        </td>
                                        <td>
                                            {{$business->owner->first_name . ' ' . $business->owner->last_name}}
                                        </td>

                                        <td>
                                            {{$business->ward_region}}
                                        </td>
                                        <td>
                                           <div class="text-center">
                                               <a href="{{route('admin.businesses.show', $business)}}" class="text-success" data-bs-toggle="tooltip" data-placement="bottom" title="Angalia">
                                                   <i class="fas fa-eye"></i>
                                               </a>
                                               <a href="{{route('admin.businesses.edit', $business)}}" class="text-primary" data-bs-toggle="tooltip" data-placement="top" title="Badilisha">
                                                   <i class="fas fa-edit px-2"></i>
                                               </a>
                                               <a class="text-danger" data-bs-toggle="tooltip" data-placement="bottom" title="Futa" data-toggle="modal" data-target="#deleteBusinessModal">
                                                   <i class="fas fa-trash"></i>
                                                   <form action="{{route('admin.businesses.destroy', $business)}}" id="deleteBusinessForm" method="post">
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
