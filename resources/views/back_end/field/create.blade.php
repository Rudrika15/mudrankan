
@extends('back_end.layout.layout')

@section('title') 
Category Create 
@endsection

@section('body')

<div class="container mt-3">
  <h2>{{__('Field Create')}}</h2>
  @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <p>{{ $message }}</p>
        </div>
    @endif
      
    <div class="d-flex flex-row-reverse">
      <a href="{{route('field.show')}}" class="btn text-white" style="background-color: #e76a35">Back </a>    
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
  <form action="{{url('backend/field/code')}}"  method="post">
      @csrf
    <div class="mb-3 mt-3">
      <label for="name">{{__('Name')}}:</label>
      <input type="text" class="form-control" id="name" placeholder="{{__('Enter Name')}}" name="name">
    </div>
    <div class="mb-3">
      <label for="desciption">{{__('Description')}}:</label>
      <textarea class="form-control" id="description" placeholder="{{__('Enter description')}}" name="description"></textarea>
    </div>
    <button type="submit" class="btn text-white" style="background-color: #1d3268">{{__('Submit')}}</button>
  </form>
</div>

<script>
        CKEDITOR.replace('description');
</script>
@endsection