@extends('layouts.auth.login')
@section('title')
    Malizia taarifa za awali
@endsection
@section('content')
     <div class="text-center m-4">
         <h4>Malizia Taarifa za awali</h4>
     </div>
     <h5 class="text-primary">2. Taarifa za Biashara</h5>

     <form action="{{route('owner.preliminary.business.post')}}" method="POST">
         @csrf
         <div class="form-group">
             <label for="Business Name">Jina la Biashara: <sup class="text-danger">*</sup></label>
             <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" placeholder="Jina">
             @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
         </div>

         <div class="form-group">
             <label for="Business Category">Kundi la Biashara: <sup class="text-danger">*</sup></label>

             <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                 <option disabled selected>Chagua...</option>
                 @forelse($categories as $category)
                     <option value="{{$category->id}}" @if(old('category_id') == $category->id) selected @endif>{{$category->name}}</option>
                 @empty
                     <option disabled>Hakuna kundi bado</option>
                 @endforelse
             </select>
             @error('category_id')
             <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
         </div>

         <div class="form-group">
             <label for="Sales Type">Huwa unauza <sup class="text-danger">*</sup></label>

             <select name="sales_type" id="sales_type" class="form-control @error('sales_type') is-invalid @enderror">
                 <option disabled selected>Chagua...</option>
                 <option value="Items" @if(old('sales_type') == "Items") selected @endif>Bidhaa pekee</option>
                 <option value="Services" @if(old('sales_type') == "Services") selected @endif>Huduma pekee</option>
                 <option value="Both" @if(old('sales_type') == "Both") selected @endif>Bidhaa na Huduma</option>

             </select>
             @error('sales_type')
             <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
         </div>

         <div class="form-group">
             <label for="Record Type">Huwa unarekodi: <sup class="text-danger">*</sup></label>

             <select name="record_type" id="record_type" class="form-control @error('record_type') is-invalid @enderror">
                 <option disabled selected>Chagua...</option>
                 <option value="Each" @if(old('record_type') == "Each") selected @endif>Kila bidhaa/huduma ninayouza</option>
                 <option value="Total" @if(old('record_type') == "Total") selected @endif>Jumla ya mapato, manunuzi na matumizi</option>
             </select>
             @error('record_type')
             <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
         </div>

         <div class="form-group d-none" id="stock">
             <label for="Credit allowed">Ungependa kurekodi bidhaa ulizonazo sasa?</label> <br>
             <div class="ml-4">
                 <div class="form-check">
                     <input class="form-check-input " type="radio" name="stock_taking" id="stock_taking" value="1" @if(old('stock_taking') == "1") checked @endif>
                     <label class="form-check-label" for="stock_taking">
                         Ndio, nataka kurekodi
                     </label>
                 </div>
                 <div class="form-check">
                     <input class="form-check-input" type="radio" name="stock_taking" id="stock_taking" value="0" @if(old('stock_taking') == "0") checked @endif>
                     <label class="form-check-label" for="stock_taking">
                         Hapana, nitarekodi kuanzia manunuzi mapya
                     </label>
                 </div>
             </div>
             @error('stock_taking')
             <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
         </div>

         <div class="mt-3">
             <button class="btn btn-block btn-primary font-weight-medium auth-form-btn" type="submit">Hifadhi</button>
         </div>
     </form>
@endsection

@section('scripts')
    <script>

        document.getElementById('record_type').addEventListener('change', showMedform)
        function showMedform(){
            if(document.getElementById('record_type').value === "Each"){
                document.getElementById('stock').className = "form-group d-block"
            }else{
                document.getElementById('stock').className = "form-group d-none"
                document.getElementById('stock').value = ""
            }
        }
    </script>
@endsection
