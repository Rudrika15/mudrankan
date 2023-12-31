@extends('back_end.layout.layout')

@section('title')
Category Create
@endsection

@section('body')

<div class="container mt-3">
  <h2>{{__('Category Create')}} </h2>
  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <p>{{ $message }}</p>
  </div>
  @endif

  <div class="d-flex flex-row-reverse">
    <a href="{{route('category.show')}}" class="btn btn-primary">Back </a>
  </div>
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
  <form enctype="multipart/form-data" action="{{route('category.code')}}" method="post">
    @csrf
    <div class="mb-3 mt-3">
      <label for="name">{{__('name')}}:</label>
      <input type="text" class="form-control" id="name" placeholder="{{__('Enter Name')}}" name="name">
    </div>
    <div class="mb-3">
      <label for="desciption">{{__('description')}}:</label>
      <textarea class="form-control" id="description" placeholder="{{__('Enter description')}}" name="description"></textarea>
    </div>
    <div class="row">
      <div class="col-md-4">
        <label for="image">{{__('image')}}:</label>
        <input type="file" accept='image/*' onchange="readURL(this,'#img1')" class="form-control" id="image" name="image">

      </div>
      <div class="col-md-4">
        <label for="image"></label>
        <img src="{{url('proimg/image_default.png')}}" alt="{{__('main image')}}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>

      </div>
    </div>
    <div>
      <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
    </div>

    <!-- 
{{ trans('sentence.category')}}
{{ trans('sentence.name')}}
{{ trans('sentence.discription')}}
{{ trans('sentence.manage_supplier')}} -->

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