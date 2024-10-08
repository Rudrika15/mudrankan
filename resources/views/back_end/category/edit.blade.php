@extends('back_end.layout.layout')
@section('title')
Category Edit
@endsection

@section('body')

<div class="container mt-3">
  <div class="container mt-3">
    <h2>{{__('Category Edit')}} </h2>
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      <p>{{ $message }}</p>
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
      <strong>Whoops!</strong> {{__('There were some problems with your input')}}.<br><br>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form action="{{route('category.edit_code')}}" enctype="multipart/form-data" method="post">
      @csrf
      <input type="hidden" name="id" value="{{$data->id}}">

      <div class="mb-3 mt-3">
        <label for="name">{{__('name')}}:</label>
        <input type="text" class="form-control" id="name" value="{{$data->name}}" placeholder="Enter Name" name="name">
      </div>
      <div class="mb-3">
        <label for="desciption">{{__('description')}}:</label>
        <textarea class="form-control" id="description" placeholder="Enter description" name="description">{{$data->description}}</textarea>
      </div>
      <div class="row">
        <div class="col-md-4">
          <label for="image">{{__('image')}}:</label>
          <input type="file" accept='image/*' onchange="readURL(this,'#img1')" class="form-control" id="image" placeholder="Enter image" name="image">

        </div>
        <div class="col-md-4">
          <label for="image"></label>
          <img src="{{url('catimg')}}/{{$data->image}}" alt="{{__('main_image')}}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>

        </div>
      </div>
      <div>
        <button type="submit" class="btn text-white" style="background-color: #1d3268">{{__('Submit')}}</button>
      </div>
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
  <script>
    CKEDITOR.replace('description');
  </script>
  @endsection