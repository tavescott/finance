@extends('layouts.dashboard.main')
@section('title')
    Shuhuda - Admin
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin " >
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Shuhuda</h3>
                </div>

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Mmiliki</th>
                                            <th>Biashara</th>
                                            <th>Nyota</th>
                                            <th>Maoni</th>
                                            <th>Chapisho</th>
                                            <th>Vitendo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($testimonials as $testimonial)
                                    <tr>
                                        <td>
                                           {{$loop->iteration}}
                                        </td>
                                        <td>
                                            {{$testimonial->owner->first_name . " " . $testimonial->owner->last_name}}
                                        </td>
                                        <td>
                                            {{$testimonial->business->name}}
                                        </td>
                                        <td>
                                            {{$testimonial->stars}}
                                        </td>
                                        <td>
                                            {{$testimonial->content}}
                                        </td>
                                        <td>
                                            @if($testimonial->approved == 1)
                                                <span class="badge badge-success">Imethibitishwa</span>
                                            @else
                                                <span class="badge badge-danger">Haijathibitishwa</span>
                                            @endif
                                        </td>
                                        <td>
                                           <div class="text-center">
                                               <a href="{{route('admin.testimonials.show', $testimonial)}}" class="text-success" data-bs-toggle="tooltip" data-placement="bottom" title="Angalia">
                                                   <i class="fas fa-eye"></i>
                                               </a>

                                               <a class="text-danger mx-3" data-bs-toggle="tooltip" data-placement="bottom" title="Futa" data-toggle="modal" data-target="#deleteBusinessModal">
                                                   <i class="fas fa-trash"></i>
                                                   <form action="{{route('admin.testimonials.destroy', $testimonial)}}" id="deletePlanForm" method="post">
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

@endsection
