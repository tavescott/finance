<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>@yield('title') | Imudu </title>
        <meta content="" name="description">
        <meta content="" name="keywords">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- Favicons -->
        <link href="{{asset('auth/assets/img/imudu_icon.svg')}}" rel="icon">
        <link href="{{asset('auth/assets/img/imudu_icon.svg')}}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('auth/assets/css/custom.css')}}">

    </head>

    <body>
        <div class="image">
            <img src="{{asset('auth/assets/img/imudu.svg')}}" width="200px"  alt="" class="p-3 mt-4">
        </div>
        <main id="main ">
            <div class="header">
                <h3 class="text-center text-white">Mfumo wa usimamizi wa fedha kwa biashara ndogo na za kati</h3>
            </div>

            <div class="line"><hr></div>
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <i class="fas fa-check-circle " ></i> <br>
                        <p>{{ session('success')}}</p>
                    </div>
                    <hr>
                @endif

                @if (session('fail'))
                    <div class="alert alert-danger" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        <p>{{ session('fail')}}</p>
                    </div>
                    <hr>
                @endif
            </div>
            <div class="sub-header">
                <span>Jisajili</span>
            </div>
            <!-- MultiStep Form -->

            @yield('content')
        </main>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

        @yield('scripts')

    </body>

</html>
