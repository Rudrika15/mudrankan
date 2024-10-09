
@extends('back_end.layout.layout')
@section('title') 
Coupon Edit
@endsection

@section('body')

<div class="container mt-3 px-5">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="card-title">Coupon Edit</h4>
        <a href="{{route('coupon.show')}}" class="btn text-white" style="background-color: #e76a35">Back </a>
      </div>

  @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <p>{{ $message }}</p>
        </div>
    @endif
      
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

  <form action="{{route('coupon.edit_code')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$coupon->id}}" id="">
    <div class="mb-3 mt-3">
      <label for="code">{{__('Code')}}:</label>
      <input type="text" class="form-control" id="code" value="{{$coupon->code}}" placeholder="{{__('Enter Code')}}" name="code">
    </div>
    
    <div class="mb-3 mt-3">
      <label for="discount">{{__('Discount')}}:</label>
      <input type="text" class="form-control" id="discount" value="{{$coupon->discount}}" placeholder="{{__('Enter discount')}}" name="discount">
    </div>
     
    
    <div class="mb-3 mt-3">
      <label for="discount_type">{{__('Discount Type')}}:</label>
      <input type="text" class="form-control" id="discount_type" value="{{$coupon->discount_type}}" placeholder="{{__('Enter discount_type')}}" name="discount_type">
    </div>
   
  
    <div class="mb-3">
      <label for="desciption">{{__('Description')}}:</label>
      <textarea class="form-control" id="description"  placeholder="{{__('Enter description')}}" name="description">{{$coupon->discription}}</textarea>
    </div>
    
    <div class="mb-3 mt-3">
      <label for="product">{{__('Product')}}:</label>
      <select class="form-control" id="product_id" name="product_id" multiple>
      @foreach($products as $product)
      <option value="{{ $product->id }}"
        @if($coupon->products->contains($product->id)) selected @endif
      >{{ $product->name }}</option>    
    @endforeach
      </select>
    </div>
    
    <div class="mb-3 mt-3">
      <label for="market">{{__('Market')}}:</label>
      <select class="form-control" id="market_id" name="market_id" multiple>
      @foreach($markets as $market)
      <option value="{{$market->id}}"
        @if($coupon->markets->contains($market->id)) selected @endif
      >{{$market->name}} </option>    
    @endforeach
      </select>
    </div>

    <div class="mb-3 mt-3">
      <label for="category">{{__('Category')}}:</label>
      <select class="form-control" id="category_id" name="category_id" multiple>
      @foreach($categories as $category)
      <option value="{{$category->id}}"
        @if($coupon->categories->contains($category->id)) selected @endif        
        >{{$category->name}} </option>    
      @endforeach
        </select>
    </div>
    
    <div class="mb-3 mt-3">
      <label for="expires_at">{{__('Expires At')}}:</label>
      <input type="date" class="form-control" id="expires_at" value="{{$coupon->expires_at}}" placeholder="{{__('Enter expires at')}}" name="expires_at">
    </div>
   
    
    <button type="submit" class="btn text-white" style="background-color: #1d3268">{{__('Submit')}}</button>
  </form>
    </div>
  </div>
</div>

<script>
    CKEDITOR.replace('description');
</script>

@endsection