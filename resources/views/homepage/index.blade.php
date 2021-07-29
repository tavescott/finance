@extends('layouts.main')

@section('title')
    Nyumbani
@endsection

@section('content')

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-9 text-center">
                    <h1>Simamia shughuli zako za kifedha</h1>
                    <h2>Kiurahisi na kiufanisi.</h2>
                </div>
            </div>
            <div class="text-center">
                <a href="{{route('register')}}" class="btn-get-started">Anza sasa</a>
            </div>

            <div class="row icon-boxes text-center">
                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon d-flex justify-content-center"><i class="fa fa-shopping-cart"></i></div>
                        <h4 class="title text-center"><a href="">Manunuzi</a></h4>
                        <p class="description">Hifadhi taarifa za manunuzi ya bidhaa katika biashara yako.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon d-flex justify-content-center"><i class="ri-money-dollar-circle-fill"></i></div>
                        <h4 class="title text-center"><a href="">Mauzo</a></h4>
                        <p class="description">Tunza taarifa za mauzo yote ya bidhaa zako kila siku. </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="400">
                    <div class="icon-box">
                        <div class="icon  d-flex justify-content-center"><i class="ri-hand-coin-fill"></i></div>
                        <h4 class="title text-center"><a href="">Matumizi</a></h4>
                        <p class="description">Simamia matumizi yote katika biashara yako</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="zoom-in" data-aos-delay="500">
                    <div class="icon-box">
                        <div class="icon  d-flex justify-content-center"><i class="ri-file-chart-line"></i></div>
                        <h4 class="title text-center"><a href="">Ripoti</a></h4>
                        <p class="description">Pata ripoti za kifedha kulingana na mahitaji ya biashara yako. </p>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- End Hero -->
    <main id="main">

        <!-- ======= Pricing Section ======= -->
        <section id="pricing" class="pricing">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Vifurushi</h2>
                    <p>Chagua kifurushi kulingana na mahitaji na ukubwa wa biashara yako</p>
                </div>

                <div class="row">

                    <div class="col-lg-4 col-md-6" data-aos="zoom-im" data-aos-delay="100">
                        <div class="box">
                            <h3>Swala</h3>
                            <h4><sup>Tzs</sup>500<span> / Ripoti</span></h4>
                            <ul>
                                <li>Rekodi Manunuzi</li>
                                <li>Rekodi Mauzo</li>
                                <li>Rekodi Matumizi</li>
                                <li>Biashara Moja</li>
                                <li>Mtumiaji mmoja</li>
                                <li>Huduma kwa wateja 24/7</li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="{{route('register')}}" class="btn-buy">Chagua</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="100">
                        <div class="box featured">
                            <h3>Simba</h3>
                            <h4><sup>Tzs</sup>10,000<span> / Mwezi</span></h4>
                            <ul>
                                <li>Rekodi Manunuzi</li>
                                <li>Rekodi Mauzo</li>
                                <li>Rekodi Matumizi</li>
                                <li><b>Biashara Mbili</b></li>
                                <li><b>Watumiaji Wawili</b></li>
                                <li>Huduma kwa wateja 24/7</li>
                                <li><b>Ripoti Bure</b></li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="{{route('register')}}" class="btn-buy">Chagua</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="100">
                        <div class="box">
                            <h3>Tembo</h3>
                            <h4><sup>Tzs</sup>30,000<span> / Mwezi</span></h4>
                            <ul>
                                <li>Rekodi Manunuzi</li>
                                <li>Rekodi Mauzo</li>
                                <li>Rekodi Matumizi</li>
                                <li><b>Biashara bila kikomo</b></li>
                                <li><b>Watumiaji bila kikomo</b></li>
                                <li>Huduma kwa wateja 24/7</li>
                                <li><b>Ripoti Bure</b></li>
                                <li><b>Ushauri wa wataalam</b></li>
                            </ul>
                            <div class="btn-wrap">
                                <a href="{{route('register')}}" class="btn-buy">Chagua</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Pricing Section -->

        <!-- ======= Testimonials Section ======= -->
        <section id="testimonials" class="testimonials">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Shuhuda</h2>
                    <p>Tazama shuhuda za hivi karibuni kutoka kwa watumiaji wa mfumo wa Jimudu.</p>
                </div>

                <div class="owl-carousel testimonials-carousel">

                    @forelse($testimonials as $testimonial)
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                {{$testimonial->content}}
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                            <h3>{{$testimonial->owner->first_name . " " . $testimonial->owner->last_name}}</h3>
                            <h4>{{$testimonial->business->name}}</h4>
                        </div>
                    @empty
                    @endforelse

                </div>

            </div>
        </section><!-- End Testimonials Section -->

        <!-- ======= Cta Section ======= -->
        <section id="cta" class="cta">
            <div class="container" data-aos="zoom-in">
                <div class="text-center">
                    <h3>Unasubiri nini?</h3>
                    <p>Kujiunga na mfumo huu ni <b>Bure</b> na <b>rahisi.</b> Jiunge sasa na Jimudu kwa maendeleo chanya ya biashara yako!</p>
                    <a class="cta-btn" href="{{route('register')}}">Jiunge</a>
                </div>
            </div>
        </section><!-- End Cta Section -->

    </main><!-- End #main -->

@endsection

