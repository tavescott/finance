
<div class="errors text-center mt-3 col-md-12" style="font-size: 17px">
    <div class="errors_displayed">
           @if(session('success'))
            <div class="alerts alert alert-success alert-dismissible fade show" role="alert">
                <div>
                    <i class="fas fa-check-circle" ></i>
                    <b>Fanikio :)  </b>
                </div>

                <span>{{session('success')}}</span>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
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
                    <strong>Kasoro!</strong> Tafadhali angalia vizuri kisha urekebishe fomu yako.
                    <ul>
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
