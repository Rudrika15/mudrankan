
@extends('back_end.layout.layout')
@section('title') 
Optiongroup edit 
@endsection

@section('body')


<div class="container mt-3">
  <h2>{{__('Option group Edit')}}</h2>
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
  <form action="{{url('backend/optiongroup/edit_code')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$data->id}}">
    
    <div class="mb-3 mt-3">
      <label for="name">{{__('Name of Group')}}:</label>
      <input type="text" class="form-control" id="name" value="{{$data->name}}" placeholder="Enter Name" name="name">
    </div>    
    
    <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
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
@endsection