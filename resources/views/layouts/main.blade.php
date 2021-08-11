<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>
            @yield('title') | Imudu
        </title>
        <meta content="Imudu ni mfumo wa kutunza taarifa za biashara yako, pamoja na kutoa ripoti kutokana na mahitaji." name="description">
        <meta content="Imudu, Bishara" name="keywords">

        <!-- Favicons -->
        <link href="{{asset('assets/img/imudu_icon.svg')}}" rel="icon">
        <link href="{{asset('assets/img/imudu_icon.svg')}}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/vendor/aos/aos.css')}}" rel="stylesheet">

        <!--Font awesome icons-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

        <!-- Template Main CSS File -->
        <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

        @yield('styles')

    </head>

    <body>

        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top">
            <div class="container d-flex align-items-center">

              <a href="#" class="logo mr-auto"><img src="{{asset('assets/img/imudu.svg')}}" alt="" class="img-fluid" width="100px"></a>

                <nav class="nav-menu d-none d-lg-block">
                    <ul>
                        <li class="active"><a href="#">Nyumbani</a></li>
                        <li><a href="#pricing">Vifurushi</a></li>
                        <li><a href="#testimonials">Shuhuda</a></li>


                    </ul>
                </nav><!-- .nav-menu -->

                    @auth
                        @if(auth()->user()->role_id == 1)
                            <a href="{{route('admin.index')}}" class="get-started-btn scrollto">
                                Dashbodi
                            </a>
                        @elseif(auth()->user()->role_id == 2)
                            <a href="{{route('owner.businesses.index')}}" class="get-started-btn scrollto">
                                Dashbodi
                            </a>
                        @elseif(auth()->user()->role_id == 3)
                            <a href="{{route('home')}}" class="get-started-btn scrollto">
                                Dashbodi
                            </a>
                        @endif
                      @else
                        <a href="{{route('login')}}" class="get-started-btn scrollto">
                            Ingia
                        </a>
                    @endauth


            </div>
        </header><!-- End Header -->

        @yield('content')

        <footer id="footer">

            <div class="footer-top">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 col-md-6 footer-contact">
                            <img src="{{asset('assets/img/imudu.svg')}}" alt="" width="150">
                            <p class="mt-3">
                                Mtaa wa Lindi <br>
                                Moshi, Kilimanjaro<br>
                                Tanzania <br><br>
                                <strong>Phone:</strong> <a href="tel:+255742529173">+255 742 529 173</a><br>
                                <strong>Email:</strong> <a href="mailto:info@rombonation.com">info@rombonation.com</a><br>
                                <strong>Website:</strong><a href="https://imudu.rombonation.com" target="_blank">imudu.rombonation.com</a><br>
                            </p>
                        </div>

                        <div class="col-lg-2 col-md-6 footer-links">
                            <h4>Viungo muhimu</h4>
                            <ul>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Nyumbani</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Vifurushi</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Shuhuda</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="{{route('register')}}">Jiunge</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="{{route('login')}}">Ingia</a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="#">Vigezo na masharti </a></li>
                                <li><i class="bx bx-chevron-right"></i> <a href="{{route('faq')}}">Maswali ya mara kwa mara</a></li>
                            </ul>
                        </div>

                        <div class="col-lg-3 col-md-6 footer-links text-center">
                            <h4>Mitandao ya kijamii</h4>
                            <div class="social-links text-center pt-md-0">
                                <a href="#" class="twitter my-1"><i class="bx bxl-twitter"></i></a> <br>
                                <a href="#" class="facebook my-1"><i class="bx bxl-facebook"></i></a> <br>
                                <a href="#" class="instagram my-1"><i class="bx bxl-instagram"></i></a> <br>
                                <a href="#" class="google-plus my-1"><i class="bx bxl-whatsapp"></i></a> <br>
                                <a href="#" class="linkedin my-1"><i class="bx bxl-telegram"></i></a> <br>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 footer-newsletter">
                            <h4>Jarida letu</h4>
                            <p>Jiunge na jarida letu upate habari kila wiki</p>
                            <form action="" method="post">
                                <input type="email" name="email"><input type="submit" value="Jiunge">
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container py-4">

                <div class="text-center">
                    <div class="copyright">
                        &copy; <strong><span>{{date('Y')}}</span></strong>. Haki zote zimehifadhiwa
                    </div>
                    <div class="credits">
                        Imetegenezwa na: <b>Rombo Nation</b>
                    </div>
                </div>

            </div>
        </footer><!-- End Footer -->

        <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
        <div id="preloader"></div>

        <!-- Vendor JS Files -->
        <script src="assets/vendor/jquery/jquery.min.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
        <script src="assets/vendor/counterup/counterup.min.js"></script>
        <script src="assets/vendor/venobox/venobox.min.js"></script>
        <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
        <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>

    </body>

</html>
