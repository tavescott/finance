@extends('layouts.auth.main')

@section('content')
    <!-- MultiStep Form -->
    <div class="body">
        <div class="row ">
            <div class="col-md-10 col-md-offset-1">
                <form id="msform" action="{{route('stepOnePost')}}" method="POST" >
                @csrf
                <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active">Taarifa binafsi</li>
                        <li>Taarifa za biashara</li>
                        <li>Uthibitisho</li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset>
                        <h2 class="fs-title">Taarifa Binafsi</h2>
                        <h3 class="fs-subtitle">Jaza fomu hii na taarifa za mmiliki wa biashara</h3>

                        <div class="row">

                            <div class="col-md-6">
                                <label for="first_name">Jina la Kwanza: <sup style="color: red;">*</sup></label>
                                <input type="text" class="form-control" style="@error('first_name') border: 1px solid red; @enderror"
                                       @if($errors->has('first_name'))
                                         value="{{old('first_name')}}"
                                       @else
                                         value ="{{$business->first_name ?? ''}}"
                                       @endif
                                       name="first_name" id="first_name"/>
                                @error('first_name')
                                <span style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="middle_name">Jina la kati: <sup style="color: red;">*</sup></label>
                                <input type="text" class="form-control " style="@error('middle_name') border: 1px solid red; @enderror"
                                       @if($errors->has('middle_name'))
                                       value="{{old('middle_name')}}"
                                       @else
                                       value ="{{$business->middle_name ?? ''}}"
                                       @endif
                                       name="middle_name" id="middle_name"/>
                                @error('middle_name')
                                    <span style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <label for="last_name">Jina la Mwisho: <sup style="color: red;">*</sup></label>
                                <input type="text" class="form-control " style="@error('last_name') border: 1px solid red; @enderror"
                                       @if($errors->has('last_name'))
                                       value="{{old('last_name')}}"
                                       @else
                                       value ="{{$business->last_name ?? ''}}"
                                       @endif
                                       name="last_name" id="last_name"/>
                                @error('last_name')
                                     <span style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="gender">Jinsia: <sup style="color: red;">*</sup></label>
                                <select class="form-control" style="@error('gender') border: 1px solid red; @enderror"   name="gender" id="gender">
                                    <option selected disabled>Chagua</option>
                                    <option value="Ke" @if($business && $business->gender == "Ke") selected @endif>Ke</option>
                                    <option value="Me" @if($business && $business->gender == "Me") selected @endif>Me</option>
                                </select>
                                @error('gender')
                                <span style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <label for="birth_date">Tarehe ya kuzaliwa: <sup style="color: red;">*</sup></label>
                                <input type="date" class="form-control " style="@error('birth_date') border: 1px solid red; @enderror"
                                       @if($errors->has('birth_date'))
                                         value="{{old('birth_date')}}"
                                       @else
                                         value ="{{$business->birth_date ?? ''}}"
                                       @endif
                                       name="birth_date" id="birth_date"/>
                                @error('birth_date')
                                <span style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="ward_region">Kata - Mkoa: <sup style="color: red;">*</sup></label>
                                <input type="text" class="form-control" placeholder="Mfano: Moshono - Arusha" style="@error('p_ward_region') border: 1px solid red; @enderror"
                                       @if($errors->has('p_ward_region'))
                                       value="{{old('p_ward_region')}}"
                                       @else
                                       value ="{{$business->p_ward_region ?? ''}}"
                                       @endif
                                       name="p_ward_region" id="p_ward_region"/>
                                @error('p_ward_region')
                                <span style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <label for="phone_number">Namba ya simu: <sup style="color: red;">*</sup></label>
                                <input type="number" class="form-control " style="@error('phone_number') border: 1px solid red; @enderror"
                                       @if($errors->has('phone_number'))
                                       value="{{old('phone_number')}}"
                                       @else
                                       value ="{{$business->phone_number ?? ''}}"
                                       @endif
                                       name="phone_number" id="phone_number"/>
                                @error('phone_number')
                                <span style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email">Barua pepe: <sup style="color: red;">*</sup></label>
                                <input type="email" class="form-control" style="@error('email') border: 1px solid red; @enderror"
                                       @if($errors->has('email'))
                                       value="{{old('email')}}"
                                       @else
                                       value ="{{$business->email ?? ''}}"
                                       @endif
                                       name="email" id="email"/>
                                @error('email')
                                <span style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <label for="p_id_type">Aina ya kitambulisho: <sup style="color: red;">*</sup></label>
                                <select class="form-control" style="@error('p_id_type') border: 1px solid red; @enderror"   name="p_id_type" id="p_id_type">
                                    <option selected disabled>Chagua</option>
                                    <option value="NIDA" @if($business && $business->p_id_type == "NIDA") selected @endif>Kitambulisho cha taifa (NIDA) </option>
                                    <option value="Voters" @if($business && $business->p_id_type == "Voters") selected @endif>Kitambulisho cha mpiga kura</option>
                                    <option value="Driving" @if($business && $business->p_id_type == "Driving") selected @endif>Lesseni ya udereva</option>
                                    <option value="TIN" @if($business && $business->p_id_type == "TIN") selected @endif>TIN namba binafsi</option>
                                    <option value="Passport" @if($business && $business->p_id_type == "Passport") selected @endif>Hati ya kusafiria</option>
                                </select>
                                @error('p_id_type')
                                <span style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="p_id_no">Namba ya kitambulisho: <sup style="color: red;">*</sup></label>
                                <input type="number" class="form-control" style="@error('p_id_no') border: 1px solid red; @enderror"
                                       @if($errors->has('p_id_no'))
                                       value="{{old('p_id_no')}}"
                                       @else
                                       value ="{{$business->p_id_no ?? ''}}"
                                       @endif
                                       name="p_id_no" id="p_id_no"/>
                                @error('p_id_no')
                                <span style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="password">Neno la siri: <sup style="color: red;">*</sup></label>
                                <input type="password" class="form-control" style="@error('password') border: 1px solid red; @enderror" name="password"
                                       @if($errors->has('password'))
                                        value="{{old('password')}}"
                                       @else
                                         value ="{{$business->password ?? ''}}"
                                       @endif
                                       id="password"/>
                                @error('password')
                                <span style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="confirm_password">Thibitisha neno la siri: <sup style="color: red;">*</sup></label>
                                <input type="password" class="form-control"  name="password_confirmation"
                                       @if($errors->has('password_confirmation'))
                                       value="{{old('password_confirmation')}}"
                                       @else
                                       value ="{{$business->password_confirmation ?? ''}}"
                                       @endif
                                       id="password"/>
                            </div>
                        </div>
                        <input type="submit"  class="next action-button" value="Endelea"/>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>
    <!-- /.MultiStep Form -->
@endsection

@section('scripts')
@endsection
