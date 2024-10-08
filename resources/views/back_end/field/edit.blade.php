
@extends('back_end.layout.layout')
@section('title') 
Category Edit
@endsection

@section('body')

<div class="container mt-3">
  <h2>{{__('Field Edit')}}</h2>
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
  <form action="{{url('backend/field/edit_code')}}"  method="post">
  @csrf
    <input type="hidden" name="id" value="{{$data->id}}">
    
    <div class="mb-3 mt-3">
      <label for="name">{{__('Name')}}:</label>
      <input type="text" class="form-control" id="name" value="{{$data->name}}" placeholder="{{__('Enter Name')}}" name="name">
    </div>
    <div class="mb-3">
      <label for="desciption">{{__('Description')}}:</label>
      <textarea class="form-control" id="description" placeholder="{{__('Enter description')}}" name="description">{{$data->description}}</textarea>
    </div>
    <button type="submit" class="btn text-white" style="background-color: #1d3268">{{__('Submit')}}</button>
  </form>
</div>

<script>
        CKEDITOR.replace('description');
</script>
@endsection
