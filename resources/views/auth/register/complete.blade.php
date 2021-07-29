@extends('layouts.auth.main')

@section('title')
    Jisajili
@endsection

@section('content')
    <!-- MultiStep Form -->
    <div class="body">
        <div class="row ">
            <div class="col-md-10 col-md-offset-1">
                <form id="msform" action="{{route('stepTwoPost')}}" method="POST">
                    @csrf
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active">Taarifa binafsi</li>
                        <li class="active">Taarifa za biashara</li>
                        <li class="active">Uthibitisho</li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset>
                        <h2 class="fs-title">FANIKIO</h2>

                        <h4 style="text-align: center">Hongera! Umefanikiwa kufanya usajili wa biashara yako! </h4>

                        <h5 style="padding-top: 20px"><b>Maelekezo</b></h5>
                          <ul style="padding-left: 20px">
                              <li><p>Tafadhali hakiki barua pepe yako kwa kutumia kiungo (link) iliotumwa kwenye barua pepe</p></li>
                              <li><p>Tafadhali subiri tukihakiki taarifa zako na za biashara yako.</p></li>
                              <li><p>Angalia maendeleo ya uhakiki hapo chini</p></li>
                          </ul>

                        <h5 style="padding-top: 20px"><b>Hatua ya uhakikishaji</b></h5>
                        <ul>Barua pepe: <b style="color: red">Haijathibitishwa</b></ul>
                        <ul>Taarifa Binafsi: <b style="color: green">Imethibitishwa</b></ul>
                        <ul>Taarifa Za Biashara: <b style="color: red">Imethibitishwa</b></ul>

                        <p style="padding-top: 20px; text-align: center">Tayari umethibitishwa? <a href="{{route('login')}}">Ingia hapa</a></p>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>
    <!-- /.MultiStep Form -->
@endsection

@section('scripts')
@endsection
