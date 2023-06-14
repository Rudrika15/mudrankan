@extends('back_end.layout.layout')
@section('title')
Productgallery create
@endsection

@section('body')

<div class="container mt-3">
  <h2>{{__('Product Gallery Edit')}}</h2>
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
  <form action="{{url('backend/productgallery/edit_code')}}" enctype="multipart/form-data" method="post">
    @csrf

    <input type="hidden" name="id" value="{{$data->id}}">

    <div class="mb-3 mt-3">
      <label for="product">{{__('Product')}}:</label>
      <select class="form-control" id="product_id" name="product_id">
        @foreach ($data1 as $data1)
        <option value="{{$data1->id}}">{{$data1->name}}</option>
        @endforeach
      </select>
    </div>

    <div class="row">
      <div class="col-md-4">
        <label for="image">{{__('Image')}}:</label>
        <input type="file" accept='image/*' onchange="readURL(this,'#img1')" class="form-control" id="image" placeholder="Enter image" name="image">

      </div>
      <div class="col-md-4">
        <label for="image"></label>
        <img src="{{url('progaimg')}}/{{$data->image}}" alt="{{__('main_image')}}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>

      </div>
    </div>


    <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
  </form>
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
@endsection