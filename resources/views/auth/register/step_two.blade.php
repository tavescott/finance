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
                        <li>Uthibitisho</li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset>
                        <h2 class="fs-title">Taarifa za biashara</h2>
                        <h3 class="fs-subtitle">Jaza fomu hii</h3>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">Jina la Biashara: <sup style="color: red;">*</sup></label>
                                <input type="text" class="form-control" style="@error('name') border: 1px solid red; @enderror"
                                                                @if($errors->has('name'))
                                                                    value="{{old('name')}}"
                                                                   @else
                                                                    value ="{{$business->name ?? ''}}"
                                                                @endif
                                                                name="name" id="name"/>
                                @error('name')
                                <span style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="name">Kundi la Biashara: <sup style="color: red;">*</sup></label>
                                <select  class="form-control" style="@error('category_id') border: 1px solid red; @enderror" name="category_id" id="category_id">
                                    <option selected disabled>Chagua</option>
                                    @forelse($categories as $category)
                                        <option value="{{$category->id}}"
                                                @if($business && $business->category_id == $category->id)
                                                    selected
                                                @endif>
                                        {{$category->name}}</option>
                                    @empty
                                        <option>No Categories yet</option>
                                    @endforelse
                                </select>
                                @error('category_id')
                                <span style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">Aina ya mauzo: <sup style="color: red;">*</sup></label>
                                <select class="form-control" style="@error('product_type') border: 1px solid red; @enderror"   name="product_type" id="product_type">
                                    <option selected disabled>Chagua</option>
                                    <option value="Bidhaa" @if($business && $business->product_type == "Bidhaa") selected @endif>Bidhaa Pekee</option>
                                    <option value="Huduma" @if($business && $business->product_type == "Huduma") selected @endif>Huduma Pekee</option>
                                    <option value="Bidhaa na Huduma" @if($business && $business->product_type == "Bidhaa na Huduma") selected @endif>Bidhaa na Huduma</option>
                                </select>
                                   @error('product_type')
                                <span style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="plan">Kifurushi: <sup style="color: red;">*</sup></label>
                                <select class="form-control" style="@error('plan_id') border: 1px solid red; @enderror"  name="plan_id" id="plan_id">
                                    <option selected disabled>Chagua</option>
                                    @forelse($plans as $plan)
                                    <option value="{{$plan->id}}" @if($business && $business->plan_id == $plan->id) selected @endif><b>{{$plan->name}}</b> - Tzs
                                        {{number_format($plan->price)}} / {{$plan->period}}</option>
                                    @empty
                                        <option>No Plans</option>
                                    @endforelse
                                </select>
                               @error('plan_id')
                                <span style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <label for="ward_region">Kata - mkoa: <sup style="color: red;">*</sup></label>
                                <input type="text" class="form-control" style="@error('ward_region') border: 1px solid red; @enderror"
                                       @if($errors->has('ward_region'))
                                       value="{{old('ward_region')}}"
                                       @else
                                       value ="{{$business->ward_region ?? ''}}"
                                       @endif
                                       name="ward_region" placeholder="Mfano: Moshono - Arusha" id="ward_region" />
                                @error('ward_region')
                                <span style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="b_id_type">Aina ya Utambulisho cha Biashara: <sup style="color: red;">*</sup></label>
                                <select class="form-control" style="@error('b_id_type') border: 1px solid red; @enderror"  name="b_id_type" id="b_id_type">
                                    <option selected disabled>Chagua</option>
                                    <option value="ujasiriamali" @if($business && $business->b_id_type == "ujasiriamali") selected @endif>Kitambulisho cha ujasiriamali</option>
                                    <option value="leseni" @if($business && $business->b_id_type == "leseni") selected @endif>Lesseni ya Biashara</option>
                                    <option value="tin" @if($business && $business->b_id_type == "tin") selected @endif>TIN namba ya Biashara</option>
                                </select>
                                @error('b_id_type')
                                <span style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="b_id_no">Namba ya Utambulisho: <sup style="color: red;">*</sup></label>
                                <input type="number" class="form-control " style="@error('b_id_no') border: 1px solid red; @enderror"
                                       @if($errors->has('b_id_no'))
                                       value="{{old('b_id_no')}}"
                                       @else
                                       value ="{{$business->b_id_no ?? ''}}"
                                       @endif
                                       name="b_id_no" id="b_id_no"/>
                                @error('b_id_no')
                                <span style="color: red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <a href="{{route('stepOne')}}" type="button" class="btn previous action-button-previous"> Rudi </a>
                        <input type="submit" name="next" class="next  action-button" value="Endelea"/>
                    </fieldset>
                </form>

            </div>
        </div>
    </div>
    <!-- /.MultiStep Form -->
@endsection

@section('scripts')
@endsection
