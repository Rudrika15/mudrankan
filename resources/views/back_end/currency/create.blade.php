
@extends('back_end.layout.layout')

@section('title') 
Currency Create 
@endsection

@section('body')

<div class="container mt-3 px-5">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="card-title">Currency Create</h4>
        <a href="{{route('currency.show')}}" class="btn text-white" style="background-color: #e76a35">Back </a>
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
  <form action="{{url('backend/currency/code')}}" method="post">
      @csrf
    <div class="mb-3 mt-3">
      <label for="name">{{__('name')}}:</label>
      <input type="text" class="form-control" id="name" placeholder="{{__('Enter Name')}}" name="name">
    </div>
    
    <div class="mb-3 mt-3">
      <label for="symbol">{{__('Symbol')}}:</label>
      <input type="text" class="form-control" id="symbol" placeholder="{{__('Enter here')}}" name="symbol">
    </div>
    <div class="mb-3 mt-3">
      <label for="code">{{__('Code')}}:</label>
      <input type="text" class="form-control" id="code" placeholder="{{__('Enter here')}}" name="code">
    </div>
    <div class="mb-3 mt-3">
      <label for="decimal_digits">{{__('Decimal Digits')}}:</label>
      <input type="text" class="form-control" id="decimal_digits" placeholder="{{__('Enter decimal digits')}}" name="decimal_digits">
    </div>
    <div class="mb-3 mt-3">
      <label for="rounding">{{__('Rounding')}}:</label>
      <input type="text" class="form-control" id="rounding" placeholder="{{__('Enter rounding')}}" name="rounding">
    </div>
    
    <button type="submit" class="btn text-white" style="background-color: #1d3268">{{__('Submit')}}</button>
  </form>
</div>
  </div>
</div>


@endsection