
<div class="errors mt-5 text-center" style="font-size: 17px">
    <div class="errors_displayed col-md-12">
        @if (session('success'))
            <div class="alerts alert alert-success alert-dismissible fade show d-flex justify-content-between" role="alert">
                <div>
                    <i class="fas fa-check-circle" ></i>
                    <b>Fanikio :)  </b>
                </div>

               <span>{{ session('success')}}</span>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <br>
        @endif

        @if (session('fail'))
            <div class="alerts alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle" ></i>
                {{ session('fail')}}

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <br>
        @endif

        @if (count($errors) > 0)
            <div class="alerts  alert alert-danger alert-dismissible fade show" role="alert">
                <div class="many">
                    <strong>Whoops!</strong> There were some problems with your input.
                    <ul style="list-style: none">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <br>
        @endif
    </div>
</div>
