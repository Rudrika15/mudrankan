
@extends('back_end.layout.layout')
@section('title') 
Option Create 
@endsection

@section('body')

<div class="container mt-3">
  <h2>{{__('Option Create')}}</h2>
  @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <p>{{ $message }}</p>
        </div>
    @endif
      
    <div class="d-flex flex-row-reverse">
      <a href="{{route('option.show')}}" class="btn text-white" style="background-color: #e76a35">{{__('Back')}} </a>    
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
  <form action="{{url('backend/option/code')}}" enctype="multipart/form-data" method="post">
    @csrf
    <div class="mb-3 mt-3">
      <label for="name">{{__('Name')}}:</label>
      <input type="text" class="form-control" id="name" placeholder="{{__('Enter Name')}}" name="name">
    </div>
    <div class="row">
    <div class="col-md-4">
    <label for="image">{{__('Image')}}:</label>
      <input type="file" accept='image/*'  onchange="readURL(this,'#img1')" class="form-control" id="image" placeholder="Enter image" name="image">
   
  </div>
  <div class="col-md-4">
    <label for="image"></label>
    <img src="{{url('backend/proimg/image_default.png')}}" alt="{{__('main_image')}}" id="img1" style='min-height:100px;min-width:100px;max-height:100px;max-width:100px'>
   
  </div>
</div>

    
    <div class="mb-3">
      <label for="desciption">{{__('Description')}}:</label>
      <textarea class="form-control" id="description" placeholder="{{__('Enter description')}}" name="description"></textarea>
    </div>
    <div class="mb-3 mt-3">
      <label for="price">{{__('Price')}}:</label>
      <input type="text" class="form-control" id="price" placeholder="{{__('Enter price')}}" name="price" multiple>
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
      <label for="optiongroup">{{__('Option Group')}}:</label>
      <select class="form-control" id="option_group_id" name="option_group_id" multiple>
      @foreach($data as $data)
    <option value="{{$data->id}}">{{$data->name}}</option>    
    @endforeach
      </select>
    </div>
    
    
    <button type="submit" class="btn text-white" style="background-color: #1d3268">{{__('Submit')}}</button>
  </form>
</div>

<script>
  function readURL(input,tgt) {
    if (input.files && input.files[0]) {    
      var reader = new FileReader();
      reader.onload = function (e) { 
      document.querySelector(tgt).setAttribute("src",e.target.result);
      };
      reader.readAsDataURL(input.files[0]); 
    }
  }
  </script>
<script>
        CKEDITOR.replace('description');
</script>
@endsection