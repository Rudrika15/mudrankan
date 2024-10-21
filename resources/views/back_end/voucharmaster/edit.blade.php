@extends('back_end.layout.layout')
@section('title')
Voucher Edit
@endsection

@section('body')

<div class="container mt-3 px-5">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="card-title">Voucher Edit</h4>
        <a href="{{ route('voucharmaster.show') }}" class="btn text-white" style="background-color: #e76a35">Back</a>
      </div>

      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <p>{{ $message }}</p>
      </div>
      @endif

      @if ($errors->any())
      <div class="alert alert-danger alert-dismissible fade show">
        <strong>Whoops!</strong> There were some problems with your input.<br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <form action="{{ url('/backend/voucharmaster/edit_code') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" id="id" name="id" value="{{ $voucharmaster->id }}">


        <div class="mb-3 mt-3">
          <label for="market">{{__('Market')}}:</label>
          <select class="form-control" id="market_id" name="market_id" multiple>
            @foreach($market as $market)
            <option value="{{$market->id}}" {{ $voucharmaster->market_id == $market->id ? 'selected' : '' }}
              >{{$market->name}} </option>
            @endforeach
          </select>
        </div>

        <div class="mb-3 mt-3">
          <label for="vouchar_name">{{ __('Voucher Name') }}:</label>
          <input type="text" class="form-control" id="vouchar_name" value="{{$voucharmaster->vouchar_name}}"
            placeholder="Enter voucher name" name="vouchar_name" required>
        </div>

        <div class="mb-3 mt-3">
          <label for="vouchar_type">Voucher Type:</label>
          <select class="form-control" id="vouchar_type" name="vouchar_type" required>
            <option value="" selected disabled>Select Voucher Type</option>
            <option value="free">Free</option>
            <option value="paid">Paid</option>
          </select>
        </div>

        <div class="mb-3 mt-3" id="price_div" style="display:none;">
          <label for="vouchar_price">Voucher Price:</label>
          <input type="text" class="form-control" value="{{$voucharmaster->vouchar_price}}" id="vouchar_price"
            placeholder="Enter voucher price" name="vouchar_price" required>
        </div>
        <input type="hidden" class="form-control" value="{{$voucharmaster->vouchar_price}}" id="Vprice"
          placeholder="Enter voucher price" name="vouchar_price" required>

        <div class="mb-3">
          <label for="vouchar_detail">Voucher Detail:</label>
          <textarea class="form-control" id="vouchar_detail" placeholder="{{ __('Enter voucher detail') }}"
            name="vouchar_detail" required>{{$voucharmaster->vouchar_detail}}</textarea>
        </div>

        <div class="mb-3 mt-3">
          <label for="vouchar_code">Voucher Code:</label>
          <input type="text" class="form-control" value="{{$voucharmaster->vouchar_code}}" id="vouchar_code"
            placeholder="Enter voucher code" name="vouchar_code" required>
        </div>

        <div class="mb-3 mt-3">
          <label for="vouchar_validUp">Voucher Valid Up:</label>
          <input type="date" class="form-control" value="{{$voucharmaster->vouchar_validUp}}" id="vouchar_validUp"
            name="vouchar_validUp" required>
        </div>

        <div class="mb-3 mt-3">
          <label for="image">Vouchar Image</label>
          <img id="output"  class="img-fluid img-thumbnail" src="{{ asset('voucharimage/' .$voucharmaster->vouchar_image) }}" alt="" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;">
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <input type="file"  style="padding: 9px 10px 4px" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" name="photo" id="photo" class="form-contol" accept="image/*">
        </div>
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
    $('#vouchar_price').on('input', function() {
      var priceDiv = $('#price_div');
      var priceValue = $(this).val();
      var priceInput = $('#vouchar_price');

      if (priceValue == '0') {
        $('#vouchar_type').val('free'); 
        if( $('#vouchar_type').val() === 'free'){
          priceDiv.show();
          priceInput.val('0').prop('readonly', true); 
        }
      } else {
        $('#vouchar_type').val('paid');
        if( $('#vouchar_type').val() === 'paid'){
          priceDiv.show();
          priceInput.val();
        }
      }
    });
    $('#vouchar_type').change(function() {
      var priceDiv = $('#price_div');
      var priceInput = $('#vouchar_price');
      var Vprice = $('#Vprice').val(); 
      console.log(Vprice);
           
      
      if ($(this).val() === 'free') {
        priceDiv.show();
        priceInput.val('0').prop('readonly', true); 
      } else {
        priceDiv.show();
        priceInput.val(Vprice === '0' ? '': Vprice ?? '').prop('readonly', false);
      }
    });

    $('#vouchar_price').trigger('input');
  });
</script>

@endsection