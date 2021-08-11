<div class="row">
    <div class="col-md-6 mt-3">
        <div class="card">
            <div class="card-header bg-white text-center rounded">
                <h4>Badili Picha</h4>
            </div>
            <div class="card-body row">
                <div class="col-md-3 d-flex align-items-center justify-content-center">
                    @if(auth()->user()->image)
                        <img src="{{asset('images/profile_images/'.auth()->user()->image)}}" class="rounded-circle" alt="profile" height="100"/>
                    @else
                        <img src="{{asset('auth/images/avatar.svg')}}" alt="profile"/>
                    @endif
                </div>
                <div class="col-md-9 form-group">
                    <form action="{{route('image.update')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Pakia picha mpya">
                            <span class="input-group-append">
                              <button class="file-upload-browse btn btn-primary" type="button">Pakia</button>
                            </span>
                        </div>
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <button class="btn btn-info  mt-3 w-100">Badili</button>
                        <a class="btn btn-danger  mt-3 w-100" data-toggle="modal" data-target="#deleteProfilePictureModal">Futa Picha</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mt-3">
        <div class="card">
            <div class="card-header bg-white text-center rounded">
                <h4>Badili neno la siri</h4>
            </div>
            <div class="card-body">
                <form action="{{route('password.update')}}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Neno siri la sasa</label>
                                <input type="password" class="form-control form-control-sm @error('current_password') is-invalid @enderror" name="current_password"  />
                                @error('current_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Neno siri jipya</label>
                                <input type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" />
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Thibitisha Neno siri jipya</label>
                                <input type="password" class="form-control form-control-sm @error('password_confirmation') is-invalid @enderror" name="password_confirmation" />
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 d-flex justify-content-center align-items-center">
                            <button class="btn btn-primary">Badili Neno la siri</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteProfilePictureModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Futa Picha ya wasifu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Una uhakika unataka kufuta picha yako ya wasifu?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hapana</button>

                <a onclick="event.preventDefault(); document.getElementById('deleteProfilePictureForm').submit();" type="button" class="btn btn-primary">Ndio</a>
                <form action="{{route('image.delete')}}" method="POST" id="deleteProfilePictureForm">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
</div>
