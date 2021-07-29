@extends('layouts.dashboard.main')

@section('title',  'Shuhuda - Mmiliki')
@section('styles')
    <link rel="stylesheet" href="{{asset('auth/testimonials/style.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin " >
            <div class="row">
                <div class="col-12 col-xl-8 offset-md-2 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold text-center">Tuambie kuhusu mfumo wetu</h3>
                    <form action="{{route('owner.testimonials.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="business_id" value="{{session()->get('business')->id}}">
                       <div class="row mt-4">
                           <div class="form-group col-md-6">
                               <label for="Jina">Jina</label>
                               <input type="text" class="form-control" value="{{auth()->user()->owner->first_name." ".auth()->user()->owner->last_name}}" disabled>
                           </div>
                           <div class="form-group col-md-6">
                               <label for="Biashara">Biashara</label>
                               <input type="text" class="form-control" value="{{session()->get('business')->name}}" disabled>
                           </div>
                       </div>
                        <div class="container d-flex justify-content-center ">
                            <div class="row rating-stars">
                                <div class="col-md-12">
                                    <div class="card @error('stars') border border-danger @enderror">
                                        <div class="card-body text-center"> <span class="myratings">{{old('stars') ?? "..."}}</span>
                                            <h4 class="mt-1">Kiwango</h4>
                                            <fieldset class="rating">
                                                <input type="radio" id="star5" name="stars" value="5"   @if(old('stars') == 5) checked @endif/>
                                                <label class="full" for="star5" title="Nzuri sana - Nyota 5"></label>

                                                <input type="radio" id="star4half" name="stars" value="4.5"  @if(old('stars') == 4.5) checked @endif/>
                                                <label class="half" for="star4half" title="Nzuri - Nyota 4"></label>

                                                <input type="radio" id="star4" name="stars" value="4" @if(old('stars') == 4) checked @endif />
                                                <label class="full" for="star4" title="Nzuri - Nyota 4.5"></label>

                                                <input type="radio" id="star3half" name="stars" value="3.5"  @if(old('stars') == 3.5) checked @endif/>
                                                <label class="half" for="star3half" title="Kawaida - Nyota 3.5"></label>

                                                <input type="radio" id="star3" name="stars" value="3"  @if(old('stars') == 3) checked @endif/>
                                                <label class="full" for="star3" title="Kawaida - Nyota 3"></label>

                                                <input type="radio" id="star2half" name="stars" value="2.5"  @if(old('stars') == 2.5) checked @endif/>
                                                <label class="half" for="star2half" title="Sio Nzuri - Nyota 2.5"></label>

                                                <input type="radio" id="star2" name="stars" value="2" @if(old('stars') == 2) checked @endif />
                                                <label class="full" for="star2" title="Sio Nzuri - Nyota 2"></label>

                                                <input type="radio" id="star1half" name="stars" value="1.5" @if(old('stars') == 1.5) checked @endif />
                                                <label class="half" for="star1half" title="Mbaya - Nyota 1.5"></label>

                                                <input type="radio" id="star1" name="stars" value="1" @if(old('stars') == 1) checked @endif />
                                                <label class="full" for="star1" title="Mbaya Sana- Nyota 1"></label>

                                                <input type="radio" id="starhalf" name="stars" value="0.5"  @if(old('stars') == 0.5) checked @endif/>
                                                <label class="half" for="starhalf" title="Mbaya Sana- Nyota 0.5"></label>

                                                <input type="radio" class="reset-option" name="stars" value="reset" />
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Content">Ujumbe</label>
                            <textarea name="content" id="content" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror"></textarea>
                        </div>
                        <button class="btn btn-success w-100">Wasilisha</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8 offset-md-2 grid-margin transparent">
            <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">

                    <p class="mb-4"></p>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('auth/testimonials/main.js')}}"></script>
@endsection
