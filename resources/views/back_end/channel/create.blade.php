@extends('back_end.layout.layout')

@section('title')
Channel Create
@endsection

@section('body')

<div class="container mt-3 px-5">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="card-title">Channel Create</h4>
        <a href="{{route('channel.show')}}" class="btn text-white" style="background-color: #e76a35">Back </a>
      </div>
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
  <form enctype="multipart/form-data" action="{{url('/backend/channel/code')}}" method="post">
    @csrf
    <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
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