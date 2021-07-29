@extends('layouts.auth.main')

@section('title')
    Jisajili
@endsection

@section('content')
    <!-- MultiStep Form -->
    <div class="body">
        <div class="row ">
            <div class="col-md-10 col-md-offset-1">
                <form id="msform">

                <!-- progressbar -->
                    <ul id="progressbar">
                        <li>Taarifa binafsi</li>
                        <li>Taarifa za biashara</li>
                        <li>Uthibitisho</li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset>
                        <h2 class="fs-title">KARIBU</h2>

                        <h4 style="text-align: center">Tunashukuru kwa kuchagua kufanya kazi na sisi</h4>

                        <h5 style="padding-top: 20px"><b>Maelekezo</b></h5>
                        <ul style="padding-left: 20px">
                            <li><p>Tafadhali hakikisha umechagua kifurushi kinachoendana na biashara yako. <a
                                        href="{{url('/#prices')}}">Angalia vifurushi</a></p></li>
                            <li><p>Tafadhali andaa namba ya kitambulisho chako binafsi</p></li>
                            <li><p>Tafadhali andaa namba ya kitambulisho cha biashara yako</p></li>
                            <li><p>Hakikisha umesoma, umeelewa na kukubaliana na <a href="#">vigezo na masharti</a> ya mfumo wa Jimudu</p></li>
                        </ul>
                        <a href="{{route('stepOne')}}"  class=" btn next  action-button">Anza Usajili</a>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>
    <!-- /.MultiStep Form -->
@endsection

@section('scripts')
@endsection
