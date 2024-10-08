
@extends('back_end.layout.layout')
@section('title') 
Vouchar Edit 
@endsection

@section('body')

<div class="container mt-3">
  <h2>Vouchar edit</h2>
  @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <p>{{ $message }}</p>
        </div>
    @endif
      
    <div class="d-flex flex-row-reverse">
      <a href="{{route('voucharmaster.show')}}" class="btn text-white" style="background-color: #e76a35">{{__('Back')}} </a>    
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
  <form action="{{route('voucharmaster.edit_code')}}" method="post">
    @csrf
    <input type="hidden" name="id" id="" value="{{$voucharmaster->id}}">
    <div class="mb-3 mt-3">
      <label for="vouchar_name">{{__('Vouchar Name')}}:</label>
      <input type="text" class="form-control" id="vouchar_name"  value="{{$voucharmaster->vouchar_name}}" placeholder="Enter vouchar name" name="vouchar_name">
    </div>
    
    <div class="mb-3 mt-3">
      <label for="vouchar_prize">Vouchar Prize:</label>
      <input type="text" class="form-control" id="vouchar_prize" value="{{$voucharmaster->vouchar_prize}}" placeholder="Enter vouchar prize" name="vouchar_prize">
    </div>
     
    
    <div class="mb-3 mt-3">
      <label for="vouchar_expiry">Vouchar Expiry:</label>
      <input type="date" class="form-control" id="vouchar_expiry" value="{{$voucharmaster->vouchar_expiry}}" placeholder="Enter vouchar_expiry" name="vouchar_expiry">
    </div>
   
    <div class="mb-3 mt-3">
      <label for="vouchar_associated_mobile">Vouchar associated mobile:</label>
      <input type="text" class="form-control" id="vouchar_associated_mobile" value="{{$voucharmaster->vouchar_associated_mobile}}" placeholder="Enter vouchar_associated_mobile" name="vouchar_associated_mobile">
    </div>
    
    <div class="mb-3 mt-3">
      <label for="quantity">Quantity:</label>
      <input type="text" class="form-control" id="quantity" value="{{$voucharmaster->quantity}}" placeholder="Enter quantity" name="quantity">
    </div>

    <div class="mb-3 mt-3">
      <label for="vouchar_status">vouchar status:</label>
    <input type="text" class="form-control" id="vouchar_status" value="{{$voucharmaster->vouchar_status}}" placeholder="Enter vouchar_status" name="vouchar_status">
    </div>
    
    <button type="submit" class="btn text-white" style="background-color: #1d3268">Submit</button>
  </form>
</div>

@endsection