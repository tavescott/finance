@extends('layouts.dashboard.main')

@section('title')
   Ona Shuhuda - Admin
@endsection

@section('styles')
    <link rel="stylesheet" href="{{asset('auth/testimonials/style.css')}}">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8  offset-md-2 grid-margin " >

            <div class="row mb-3 d-flex align-items-center justify-content-center">
                <h3 class="font-weight-bold text-center">Angalia Shuhuda</h3>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <h4 class="my-3">Jina:  <span class="text-primary pl-3">{{$testimonial->owner->first_name . " " . $testimonial->owner->last_name}}</span></h4>
                        </div>
                        <div class="col-md-4">
                            <h4 class="my-3">Biashara: <span class="text-primary pl-3">{{$testimonial->business->name}}</span></h4>
                        </div>
                        <div class="col-md-4">
                            <h4 class="my-3">Tarehe: <span class="text-primary pl-3">{{date('d/m/Y', strtotime($testimonial->created_at))}}</span></h4>
                        </div>
                    </div>
                    <div class="container d-flex justify-content-center ">
                        <div class="row rating-stars">
                            <div class="col-md-12">
                                <div class="card @error('stars') border border-danger @enderror">
                                    <div class="card-body text-center">
                                        <h4 class="mt-1">Kiwango:</h4>
                                        <span class="myratings">{{$testimonial->stars}}</span>
                                        <fieldset class="rating">
                                            <input type="radio" id="star5" name="stars" value="5"   @if($testimonial->stars == 5) checked @endif />
                                            <label class="full" for="star5" title="Nzuri sana - Nyota 5"></label>

                                            <input type="radio" id="star4half" name="stars" value="4.5"  @if($testimonial->stars == 4.5) checked @endif/>
                                            <label class="half" for="star4half" title="Nzuri - Nyota 4"></label>

                                            <input type="radio" id="star4" name="stars" value="4" @if($testimonial->stars == 4) checked @endif />
                                            <label class="full" for="star4" title="Nzuri - Nyota 4.5"></label>

                                            <input type="radio" id="star3half" name="stars" value="3.5"  @if($testimonial->stars == 3.5) checked @endif/>
                                            <label class="half" for="star3half" title="Kawaida - Nyota 3.5"></label>

                                            <input type="radio" id="star3" name="stars" value="3"  @if($testimonial->stars == 3) checked @endif/>
                                            <label class="full" for="star3" title="Kawaida - Nyota 3"></label>

                                            <input type="radio" id="star2half" name="stars" value="2.5"  @if($testimonial->stars == 2.5) checked @endif/>
                                            <label class="half" for="star2half" title="Sio Nzuri - Nyota 2.5"></label>

                                            <input type="radio" id="star2" name="stars" value="2" @if($testimonial->stars == 2) checked @endif />
                                            <label class="full" for="star2" title="Sio Nzuri - Nyota 2"></label>

                                            <input type="radio" id="star1half" name="stars" value="1.5" @if($testimonial->stars == 1.5) checked @endif />
                                            <label class="half" for="star1half" title="Mbaya - Nyota 1.5"></label>

                                            <input type="radio" id="star1" name="stars" value="1" @if($testimonial->stars == 1) checked @endif />
                                            <label class="full" for="star1" title="Mbaya Sana- Nyota 1"></label>

                                            <input type="radio" id="starhalf" name="stars" value="0.5"  @if($testimonial->stars == 0.5) checked @endif/>
                                            <label class="half" for="starhalf" title="Mbaya Sana- Nyota 0.5"></label>

                                            <input type="radio" class="reset-option" name="stars" value="reset" />
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <h4>Maoni:</h4>
                        <textarea id="" cols="30" rows="10" class="form-control" disabled>
                            {{$testimonial->content}}
                        </textarea>
                    </div>
                    <form action="{{route('admin.testimonials.update', $testimonial)}}" method="POST">
                        @csrf
                        @method("PATCH")

                        @if($testimonial->approved == 0)
                            <button class="btn btn-success w-100">Chapisha</button>
                        @else
                            <button class="btn btn-danger w-100">Rudisha Chapisho</button>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('auth/testimonials/main.js')}}"></script>
@endsection

