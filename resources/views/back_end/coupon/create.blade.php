
@extends('back_end.layout.layout')
@section('title') 
Coupon Create 
@endsection

@section('body')

<div class="container mt-3">
  <h2>{{__('Coupon Create')}}</h2>
  @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <p>{{ $message }}</p>
        </div>
    @endif
      
    <div class="d-flex flex-row-reverse">
      <a href="{{route('coupon.show')}}" class="btn text-white" style="background-color: #e76a35">Back </a>    
    </div>
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form action="{{url('backend/coupon/code')}}" method="post">
    @csrf
    <div class="mb-3 mt-3">
      <label for="code">{{__('Code')}}:</label>
      <input type="text" class="form-control" id="code" placeholder="{{__('Enter Code')}}" name="code">
    </div>
    
    <div class="mb-3 mt-3">
      <label for="discount">{{__('Discount')}}:</label>
      <input type="text" class="form-control" id="discount" placeholder="{{__('Enter discount')}}" name="discount">
    </div>
     
    
    <div class="mb-3 mt-3">
      <label for="discount_type">{{__('Discount Type')}}:</label>
      <input type="text" class="form-control" id="discount_type" placeholder="{{__('Enter discount_type')}}" name="discount_type">
    </div>
   
  
    <div class="mb-3">
      <label for="desciption">{{__('Description')}}:</label>
      <textarea class="form-control" id="description" placeholder="{{__('Enter description')}}" name="description"></textarea>
    </div>
    
    <div class="mb-3 mt-3">
      <label for="product">{{__('Product')}}:</label>
      <select class="form-control" id="product_id" name="product_id" multiple>
      @foreach($data1 as $data1)
    <option value="{{$data1->id}}">{{$data1->name}}</option>    
    @endforeach
      </select>
    </div>
    
    <div class="mb-3 mt-3">
      <label for="market">{{__('Market')}}:</label>
      <select class="form-control" id="market_id" name="market_id" multiple>
      @foreach($data2 as $data2)
    <option value="{{$data2->id}}">{{$data2->name}}</option>    
    @endforeach
      </select>
    </div>

    <div class="mb-3 mt-3">
      <label for="category">{{__('Category')}}:</label>
      <select class="form-control" id="category_id" name="category_id" multiple>
      @foreach($data3 as $data3)
    <option value="{{$data3->id}}">{{$data3->name}}</option>    
    @endforeach
      </select>
    </div>
    
    <div class="mb-3 mt-3">
      <label for="expires_at">{{__('Expires At')}}:</label>
      <input type="date" class="form-control" id="expires_at" placeholder="{{__('Enter expires at')}}" name="expires_at">
    </div>
   
{{-- <div class="mb-3 mt-3">
      <label for="enabled">{{__('Enabled')}}:</label>
      <input type="checkbox" id="enabled" name="enabled">
    </div> --}}
    
    <button type="submit" class="btn text-white" style="background-color: #1d3268">{{__('Submit')}}</button>
  </form>
</div>


<script>
        CKEDITOR.replace('description');
</script>
@endsection