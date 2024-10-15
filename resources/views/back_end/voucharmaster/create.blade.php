
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
  <form action="{{url('backend/voucharmaster/code')}}" method="post">
    @csrf
    <div class="mb-3 mt-3">
      <label for="vouchar_name">{{__('Vouchar Name')}}:</label>
      <input type="text" class="form-control" id="vouchar_name" placeholder="Enter vouchar name" name="vouchar_name">
    </div>
    
    <div class="mb-3 mt-3">
      <label for="vouchar_prize">Vouchar Prize:</label>
      <input type="text" class="form-control" id="vouchar_prize" placeholder="Enter vouchar prize" name="vouchar_prize">
    </div>
     
    
    <div class="mb-3 mt-3">
      <label for="vouchar_expiry">Vouchar Expiry:</label>
      <input type="date" class="form-control" id="vouchar_expiry" placeholder="Enter vouchar_expiry" name="vouchar_expiry">
    </div>
   
    <div class="mb-3 mt-3">
      <label for="vouchar_associated_mobile">Vouchar associated mobile:</label>
      <input type="text" class="form-control" id="vouchar_associated_mobile" placeholder="Enter vouchar_associated_mobile" name="vouchar_associated_mobile">
    </div>
    
    <div class="mb-3 mt-3">
      <label for="quantity">Quantity:</label>
      <input type="text" class="form-control" id="quantity" placeholder="Enter quantity" name="quantity">
    </div>

    {{-- <div class="mb-3 mt-3">
      <label for="vouchar_status">vouchar status:</label>
    <input type="text" class="form-control" id="quantity" placeholder="Enter vouchar_status" name="vouchar_status">
    </div> --}}
    
    <button type="submit" class="btn text-white" style="background-color: #1d3268">Submit</button>
  </form>
</div>
  </div>
</div>

@endsection