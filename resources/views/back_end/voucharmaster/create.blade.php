
@extends('back_end.layout.layout')
@section('title') 
Vouchar Create 
@endsection

@section('body')

<div class="container mt-3 px-5">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="card-title">Vouchar Create</h4>
        <a href="{{route('voucharmaster.show')}}" class="btn text-white" style="background-color: #e76a35">Back </a>
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
  <form action="{{url('backend/voucharmaster/code')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" id="user_id" name="user_id" value="{{Auth::user()->id}}">
    <div class="mb-3 mt-3">
      <label for="market">{{__('Market')}}:</label>
      <select class="form-control" id="market_id" name="market_id" multiple>
        @foreach($market as $data2)
        <option value="{{$data2->id}}">{{$data2->name}}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3 mt-3">
      <label for="vouchar_name">{{__('Vouchar Name')}}:</label>
      <input type="text" class="form-control" id="vouchar_name" placeholder="Enter vouchar name" name="vouchar_name">
    </div>

    <div class="mb-3 mt-3">
      <label for="vouchar_type">Vouchar Type:</label>
      <select class="form-control" id="vouchar_type" name="vouchar_type">
        <option value="" selected disabled>Select Vouchar Type</option>
        <option value="free">Free</option>
        <option value="paid">Paid</option>
      </select>
    </div>
    
    <div class="mb-3 mt-3" id="price_div" style="display:none;">
      <label for="vouchar_price">Vouchar Price:</label>
      <input type="text" class="form-control" id="vouchar_price" placeholder="Enter vouchar price" name="vouchar_price">
    </div>
     
    <div class="mb-3">
      <label for="vouchar_detail">Vouchar Detail:</label>
      <textarea class="form-control" id="vouchar_detail" placeholder="{{__('Enter vouchar detail')}}" name="vouchar_detail"></textarea>
    </div>
    <div class="mb-3 mt-3">
      <label for="vouchar_code">Vouchar Code:</label>
      <input type="text" class="form-control" id="vouchar_code" placeholder="Enter vouchar code" name="vouchar_code">
    </div>

    <div class="mb-3 mt-3">
      <label for="vouchar_validUp">Vouchar ValidUp:</label>
      <input type="date" class="form-control" id="vouchar_validUp" placeholder="Enter vouchar_expiry" name="vouchar_validUp">
    </div>
    <div class="mb-3 mt-3">
      <label for="image">Vouchar Image</label>
      <img id="imagePreview" src="#" alt="Image Preview" style="display:none; margin-bottom:5px;  width: 100px; height: 100px; object-fit: cover; border-radius: 5px;"/>
      <input type="file" class="form-control " id="photo"
      name="photo" accept="image/*" onchange="previewImage(event)">
  </div>

    <button type="submit" class="btn text-white" style="background-color: #1d3268">Submit</button>
  </form>
</div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  CKEDITOR.replace('vouchar_detail');

  $(document).ready(function() {
    $('#vouchar_type').change(function() {
      var priceDiv = $('#price_div');
      var priceInput = $('#vouchar_price');
      
      if ($(this).val() === 'free') {
        priceDiv.show();
        priceInput.val('0').prop('readonly', true); 
      } else {
        priceDiv.show();
        priceInput.val('').prop('readonly', false);
      }
    });
  });
</script>
<script>
      function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('imagePreview');
        output.src = reader.result;
        output.style.display = 'block'; 
    }
    reader.readAsDataURL(event.target.files[0]);
}

</script>
@endsection