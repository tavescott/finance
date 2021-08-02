@extends('layouts.dashboard.main')
@section('title')
    Vipimo - Admin
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin " >

            <div class="row">
                <div class="col-12 col-xl-12 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold text-center">Vipimo</h3>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="text-center">Ongeza kipmo</h5>
                            <hr>
                            <form action="{{route('admin.units.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Jina la Kipimo</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Kiwango</label>
                                    <select name="level" id="level" class="form-control @error('level') is-invalid @enderror">
                                        <option selected disabled>...</option>

                                        <option value="1" @if(old('level') === 1) selected @endif>1 <small>(Kipimo kikubwa)</small></option>
                                        <option value="2" @if(old('level') === 2) selected @endif>2 <small>(Kipimo kidogo)</small></option>
                                        <option value="3" @if(old('level') === 3) selected @endif>3 <small>(Kipimo kidogo zaidi)</small></option>

                                    </select>

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
                            <h5 class="text-center">Vipimo vilivyopo</h5>
                            <hr>
                            <div class="table-responsive">
                                <table class="table table-striped text-center table-sm">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Jina</th>
                                        <th>Kiwango</th>
                                        <th>Vitendo</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($units as $unit)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$unit->name}}</td>
                                            <td>{{$unit->level}}</td>

                                            <td>
                                                <a class="text-danger mx-3" onclick="event.preventDefault(); document.getElementById('deleteUnitForm').submit();">
                                                    <i class="fas fa-trash"></i>
                                                    <form action="{{route('admin.units.destroy', $unit)}}" id="deleteUnitForm" method="post">
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
                                    {!! $units->links() !!}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

