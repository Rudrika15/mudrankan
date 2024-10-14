@extends('back_end.layout.layout')
@section('title')
Product edit
@endsection

@section('body')

<div class="container mt-3">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="card-title">Product Edit</h4>
        <a href="{{route('product.show')}}" class="btn text-white" style="background-color: #e76a35">Back </a>
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
  <form action="{{url('backend/product/edit_code')}}" enctype="multipart/form-data" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$data->id}}">
    <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
    <div class="mb-3 mt-3">
      <label for="name">{{__('name')}}:</label>
      <input type="text" class="form-control" id="name" value="{{$data->name}}" placeholder="Enter Name" name="name">
    </div>
    <div class="mb-3 mt-3">
      <label for="price">{{__('Price')}}:</label>
      <input type="text" class="form-control" id="price" value="{{$data->price}}" placeholder="Enter price" name="price">
    </div>
    <div class="mb-3 mt-3">
      <label for="discount">{{__('discount price')}}:</label>
      <input type="text" class="form-control" id="discount_price" value="{{$data->discount_price}}" placeholder="Enter discount price" name="discount_price">
    </div>

    <div class="mb-3">
      <label for="desciption">{{__('Description')}}:</label>
      <textarea class="form-control" id="description" placeholder="Enter description" name="description">{{$data->description}}"</textarea>
    </div>

    <div class="mb-3 mt-3">
      <label for="capacity">{{__('Capacity')}}:</label>
      <input type="text" class="form-control" value="{{$data->capacity}}" id="capacity" placeholder="Enter capacity" name="capacity">
    </div>

    <div class="mb-3 mt-3">
      <label for="unit">{{__('Unit')}}:</label>
      <input type="text" class="form-control" id="unit" value="{{$data->unit}}" placeholder="Enter unit" name="unit">
    </div>

    <div class="mb-3 mt-3">
      <label for="package count">{{__('Package Count')}}:</label>
      <input type="text" class="form-control" id="package_count" value="{{$data->package_count}}" placeholder="Enter package count" name="package_count">
    </div>

    <div class="mb-3 mt-3">
      <label for="category">{{__('Category')}}:</label>
      <select class="form-control" id="category_id" placeholder="Enter package count" name="category_id">
        @foreach($data1 as $data1)
        <option value="{{$data1->id}}">{{$data1->name}}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3 mt-3">
      <label for="category">{{__('Market')}}:</label>
      <select class="form-control" id="market_id" placeholder="Enter package count" name="market_id">
        @foreach($data2 as $data2)
        <option value="{{$data2->id}}">{{$data2->name}}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3 mt-3">
      <label for="featured">{{__('Featured')}}:</label>
      <input type="text" class="form-control" id="featured" value="{{$data->featured}}" placeholder="Enter featured" name="featured">
    </div>

    <div class="mb-3 mt-3">
      <label for="deliverable_product">{{__('Deliverable Product')}}:</label>
      <input type="text" class="form-control" id="deliverable_product" value="{{$data->deliverable_product}}" placeholder="" name="deliverable_product">
    </div>
    <div class="row">
      <div class="col-md-4">
        <label for="image">{{__('Image1')}}:</label>
        <input type="file" accept='image/*' onchange="readURL(this,'#img1')" class="form-control" id="image" placeholder="Enter image" name="image">

      </div>
      <div class="col-md-4">
        <label for="image">{{__('Image1')}}:</label>
        <img src="{{url('proimg')}}/{{$data->image}}" alt="{{__('main_image')}}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>

      </div>
    </div>
    @foreach($data3 as $index=>$image)
    <div class="row">
          <div class="col-md-4">
            <label for="image_{{$index}}">{{__('Image' . ($index+1))}}:</label>
            <input type="file" accept='image/*' onchange="readURL(this,'#img_{{$index}}')" class="form-control" id="image_{{$index}}" placeholder="Enter image" name="image[{{$index}}]">
          </div>  
            <div class="col-md-4">
                <label for="image_{{$index}}">{{__('Image' . ($index+1))}}:</label>
                  <img src="{{url('progaimg')}}/{{$image->image}}" alt="Product Image"  id="img_{{$index}}" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>
              </div>
        </div>
      @endforeach

    <button type="submit" class="btn text-white" style="background-color: #1d3268">{{__('Submit')}}</button>
</div>
</form>
  </div>
</div>
</div>

<script>
  function readURL(input, tgt) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        document.querySelector(tgt).setAttribute("src", e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
<script>
  CKEDITOR.replace('description');
</script>
@endsection