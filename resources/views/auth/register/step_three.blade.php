@extends('layouts.auth.main')

@section('title')
    Jisajili
@endsection

@section('content')
    <!-- MultiStep Form -->
    <div class="body">
        <div class="row ">
            <div class="col-md-10 col-md-offset-1">
                <form id="msform" action="{{route('stepThreePost')}}" method="POST" >
                @csrf
                <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active">Taarifa za biashara</li>
                        <li class="active">Taarifa binafsi</li>
                        <li class="active">Uthibitisho</li>
                    </ul>
                    <fieldset>
                        <h2 class="fs-title">Uthibitisho</h2>
                        <h3 class="fs-subtitle">Tafadhali hakiki taarifa ulizojaza, kisha dhibitisha taarifa hizo</h3>


                        <div class="row confirm">

                            <div class="col-md-6">
                                <h4>Taarifa za mmiliki</h4>

                                <ul>
                                    <li>Majina: <b>{{ucfirst($business->first_name).' '.ucfirst($business->middle_name).' '.ucfirst($business->last_name)}}</b></li>
                                    <li>Jinsia: <b>{{$business->gender}}</b></li>
                                    <li>Kuzaliwa: <b>{{date('d M Y', strtotime($business->birth_date))}}</b></li>
                                    <li>Kata - Mkoa: <b>{{$business->p_ward_region}}</b></li>
                                    <li>Simu: <b>{{$business->phone_number}}</b></li>
                                    <li>Barua Pepe: <b>{{$business->email}}</b></li>
                                    <li>Aina ya Kitambulisho: <b>{{$business->p_id_type}}</b></li>
                                    <li>Namba ya Kitambulisho: <b>{{$business->p_id_no}}</b></li>
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <h4>Taarifa za biashara</h4>
                                <ul>
                                    <li>Jina: <b>{{$business->name}}</b></li>
                                    <li>Kundi: <b>{{$cat->name}}</b></li>
                                    <li>Mauzo ya: <b>{{$business->product_type}}</b></li>
                                    <li>Kifurushi: <b>{{$plan->name}}</b> <small> <i>(Tzs {{$plan->price}} / {{$plan->period}})</i> </small></li>
                                    <li>Kata - Mkoa: <b>{{$business->ward_region}}</b></li>
                                    <li>Aina ya Kitambulisho: <b>{{$business->b_id_type}}</b></li>
                                    <li>Namba ya Kitambulisho: <b>{{$business->b_id_no}}</b></li>
                                </ul>
                            </div>

                        </div>

                        <div style="display: flex; align-items: inherit; justify-content: center;">
                            <input type="checkbox" name="details" class="">
                            <span style="padding-left: 10px;">Nathibitisha kuwa taarifa nilizojaza ni za ukweli, na ni za kwangu.</span>
                            @error('details')
                                 <span style="color: red">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div style="display: flex; align-items: inherit; justify-content: center; padding-top: 20px">
                            <input type="checkbox" name="terms" class="">
                            <span style="padding-left: 10px;">Nathibitisha nimesoma na kukubaliana na <a href="#">Vigezona masharti</a> ya mfumo ya jimudu.</span>
                            @error('terms')
                                <span style="color: red">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <a href="{{route('stepTwo')}}" type="button" class="btn previous action-button-previous"> Rudi </a>
                        <input type="submit"  class="next action-button" value="Wasilisha"/>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>
    <!-- /.MultiStep Form -->
@endsection

@section('scripts')
@endsection
