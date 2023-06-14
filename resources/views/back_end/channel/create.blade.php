@extends('back_end.layout.layout')

@section('title')
Channel Create
@endsection

@section('body')

<div class="container mt-3">
  <h2>{{__('Channel Create')}} </h2>
  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <p>{{ $message }}</p>
  </div>
  @endif

  <div class="d-flex flex-row-reverse">
    <a href="{{route('channel.show')}}" class="btn btn-primary">Back </a>
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
  <form enctype="multipart/form-data" action="{{url('channel/code')}}" method="post">
    @csrf
    <div class="mb-3 mt-3">
      <label for="name">{{__('Name')}}:</label>
      <input type="text" class="form-control" id="name" placeholder="{{__('Enter Name')}}" name="name">
    </div>
    <div class="mb-3">
      <label for="address">{{__('Address')}}:</label>
      <textarea class="form-control" id="address" name="address" placeholder="{{__('Enter address')}}"></textarea>
    </div>
    <div class="mb-3">
      <label for="city">{{__('City')}}:</label>
      <input type="text" class="form-control" id="city" placeholder="Enter city" name="city">
    </div>

    <div class="mb-3">
      <label for="aadharcard">{{__('Aadhar Card Number')}}:</label>
      <input type="text" class="form-control" id="aadharcard" placeholder="Enter aadharcard" name="aadharcard">
    </div>

    <div class="mb-3">
      <label for="pancard">{{__('Pan Card Number')}}:</label>
      <input type="text" class="form-control" id="pancard" placeholder="Enter pancard" name="pancard">
    </div>

    <div class="mb-3">
      <label for="contact">{{__('Contact Number')}}:</label>
      <input type="text" class="form-control" id="contact" placeholder="Enter contact" name="contact">
    </div>

    <div class="mb-3">
      <label for="partnership">{{__('Partnership(%)')}}:</label>
      <input type="text" class="form-control" id="partnership" placeholder="Enter Partnership" name="partnership">
    </div>

    <div class="mb-3">
      <label for="url">{{__('URL')}}:</label>
      <input type="text" class="form-control" id="url" placeholder="Enter url" name="url">
    </div>
    <div>
      <div>
        <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
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