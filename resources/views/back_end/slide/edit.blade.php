@extends('back_end.layout.layout')
@section('title')
Slide edit
@endsection

@section('body')

<div class="container mt-3 px-5">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="card-title">Slide Edit</h4>
        <a href="{{route('slide.show')}}" class="btn text-white" style="background-color: #e76a35">Back </a>
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
  <form action="{{url('backend/slide/edit_code')}}" enctype="multipart/form-data" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$data->id}}">
    <div class="mb-3 mt-3">
      <label for="order">{{__('Order')}}:</label>
      <input type="text" class="form-control" id="order" value="{{$data->order}}" placeholder="Enter order" name="order">
    </div>

    <div class="mb-3 mt-3">
      <label for="text">{{__('Text')}}:</label>
      <input type="text" class="form-control" id="text" value="{{$data->text}}" placeholder="Enter text" name="text">
    </div>
    <div class="mb-3 mt-3">
      <label for="button">{{__('Button')}}:</label>
      <input type="text" class="form-control" id="button" value="{{$data->button}}" placeholder="Enter button" name="button">
    </div>
    <div class="mb-3 mt-3">
      <label for="text_position">{{__('Text Position')}}:</label>
      <input type="text" class="form-control" id="text_position" value="{{$data->text_position}}" placeholder="Enter text position" name="text_position">
    </div>
    <div class="mb-3 mt-3">
      <label for="text_color">{{__('Text Color')}}:</label>
      <input type="text" class="form-control" id="text_color" value="{{$data->text_color}}" placeholder="Enter text color" name="text_color">
    </div>
    <div class="mb-3 mt-3">
      <label for="button_color">{{__('Button Color')}}:</label>
      <input type="text" class="form-control" id="button_color" value="{{$data->button_color}}" placeholder="Enter button color" name="button_color">
    </div>
    <div class="mb-3 mt-3">
      <label for="background_color">{{__('Background Color')}}:</label>
      <input type="text" class="form-control" id="background_color" value="{{$data->background_color}}" placeholder="Enter background color" name="background_color">
    </div>
    <div class="mb-3 mt-3">
      <label for="indicator_color">{{__('Indicator Color')}}:</label>
      <input type="text" class="form-control" id="indicator_color" value="{{$data->indicator_color}}" placeholder="Enter indicator color" name="indicator_color">
    </div>

    <div class="row">
      <div class="col-md-4">
        <label for="image">{{__('Image')}}:</label>
        <input type="file" accept='image/*' onchange="readURL(this,'#img1')" class="form-control" id="image" placeholder="Enter image" name="image">

      </div>
      <div class="col-md-4">
        <label for="image"></label>
        <img src="{{url('slidimg')}}/{{$data->image}}" alt="{{__('main_image')}}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>

      </div>
    </div>
    <div class="mb-3 mt-3">
      <label for="image_fit">{{__('Image Fit')}}:</label>
      <input type="text" class="form-control" id="image_fit" value="{{$data->image_fit}}" placeholder="Enter" name="image_fit">
    </div>
    <div class="mb-3 mt-3">
      <label for="product">{{__('Product')}}:</label>
      <select class="form-control" id="product_id" placeholder="Enter Prduct" name="product_id">
        @foreach($data1 as $data1)
        <option value="{{$data1->id}}">{{$data1->name}}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3 mt-3">
      <label for="market">{{__('Market')}}:</label>
      <select class="form-control" id="market_id" placeholder="Enter market" name="market_id">
        @foreach($data2 as $data2)
        <option value="{{$data2->id}}">{{$data2->name}}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3 mt-3">
      <label for="enabled">{{__('Enabled')}}:</label>
      <input type="checkbox" id="enabled" value="checked" name="enabled">
    </div>

    <div>
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

@endsection