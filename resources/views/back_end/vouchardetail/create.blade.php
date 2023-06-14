
@extends('back_end.layout.layout')
@section('title') 
Vouchardetail Create 
@endsection

@section('body')

<div class="container mt-3">
  <h2>{{__('Vouchardetail Create')}}</h2>
  @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <p>{{ $message }}</p>
        </div>
    @endif
      
    <div class="d-flex flex-row-reverse">
      <a href="{{route('vouchardetail.show')}}" class="btn btn-primary">{{__('Back')}} </a>    
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
  <form action="{{url('backend/voucharmaster/code')}}" method="post">
    @csrf
    <div class="mb-3 mt-3">
      <label for="vouchar_name">{{__('Vouchar Name')}}:</label>
      <input type="text" class="form-control" id="vouchar_name" placeholder="{{__('Enter vouchar name')}}" name="vouchar_name">
    </div>
    
    <div class="mb-3 mt-3">
      <label for="vouchar_prize">{{__('Vouchar Prize')}}:</label>
      <input type="text" class="form-control" id="vouchar_prize" placeholder="{{__('Enter vouchar prize')}}" name="vouchar_prize">
    </div>
     
    
    <div class="mb-3 mt-3">
      <label for="vouchar_expiry">{{__('Vouchar Expiry')}}:</label>
      <input type="date" class="form-control" id="vouchar_expiry" placeholder="{{__('Enter vouchar_expiry')}}" name="vouchar_expiry">
    </div>
   
    <div class="mb-3 mt-3">
      <label for="vouchar_associated_mobile">{{__('Vouchar Associated Mobile')}}:</label>
      <input type="text" class="form-control" id="vouchar_associated_mobile" placeholder="{{__('Enter vouchar_associated_mobile')}}" name="vouchar_associated_mobile">
    </div>
    
    <div class="mb-3 mt-3">
      <label for="quantity">{{__('Quantity')}}:</label>
      <input type="text" class="form-control" id="quantity" placeholder="{{__('Enter quantity')}}" name="quantity">
    </div>

    <div class="mb-3 mt-3">
      <label for="vouchar_status">{{__('Vouchar Status')}}:</label>
    <input type="text" class="form-control" id="quantity" placeholder="{{__('Enter vouchar_status')}}" name="vouchar_status">
    </div>
    
    <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
  </form>
</div>

@endsection