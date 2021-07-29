@extends('layouts.dashboard.main')
@section('title')
    Biashara - Admin
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin " >

            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Watumiaji wa mfumo</h3>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#all" role="tab" aria-controls="pills-home" aria-selected="true">Wote</a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#admins" role="tab" aria-controls="pills-profile" aria-selected="false">Admin</a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#owners" role="tab" aria-controls="pills-contact" aria-selected="false">Wamiliki</a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#helpers" role="tab" aria-controls="pills-contact" aria-selected="false">Wasaidizi</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="pills-home-tab">
                            @include('admin.users.tables.all')
                        </div>
                        <div class="tab-pane fade" id="admins" role="tabpanel" aria-labelledby="pills-profile-tab">
                            @include('admin.users.tables.admins')
                        </div>
                        <div class="tab-pane fade" id="owners" role="tabpanel" aria-labelledby="pills-contact-tab">
                            @include('admin.users.tables.owners')
                        </div>
                        <div class="tab-pane fade" id="helpers" role="tabpanel" aria-labelledby="pills-contact-tab">
                            @include('admin.users.tables.helpers')
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
