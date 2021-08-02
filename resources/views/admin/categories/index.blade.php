@extends('layouts.dashboard.main')
@section('title')
    Makundi - Admin
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin " >

            <div class="row">
                <div class="col-12 col-xl-12 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold text-center">Makundi ya biashara</h3>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="text-center">Ongeza kundi</h5>
                            <hr>
                            <form action="{{route('admin.categories.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Jina la kundi</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>

                                <button class="btn btn-primary">Hifadhi</button>
                                <hr>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="text-center">Makundi yaliopo</h5>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-striped text-center table-sm">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Jina</th>
                                        <th>Vitendo</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($categories as $category)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$category->name}}</td>

                                            <td>
                                                <a class="text-danger mx-3" onclick="event.preventDefault(); document.getElementById('deleteCategoryForm').submit();">
                                                    <i class="fas fa-trash"></i>
                                                    <form action="{{route('admin.categories.destroy', $category)}}" id="deleteCategoryForm" method="post">
                                                        @method('DELETE')
                                                        @csrf
                                                    </form>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">Hakuna Makundi Bado</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center mt-3">
                                    {!! $categories->links() !!}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

