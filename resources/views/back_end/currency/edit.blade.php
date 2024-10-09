
@extends('back_end.layout.layout')
@section('title') 
Currency Edit
@endsection

@section('body')

<div class="container mt-3 px-5">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="card-title">Currency Edit</h4>
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
  <form action="{{url('backend/currency/edit_code')}}" method="post">
  @csrf
    <input type="hidden" name="id" value="{{$data->id}}">
    
    <div class="mb-3 mt-3">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" value="{{$data->name}}" placeholder="Enter Name" name="name">
    </div>
    <div class="mb-3 mt-3">
      <label for="symbol">Symbol:</label>
      <input type="text" class="form-control" value="{{$data->symbol}}" id="symbol" placeholder="Enter here" name="symbol">
    </div>
    <div class="mb-3 mt-3">
      <label for="code">Code:</label>
      <input type="text" class="form-control" id="code" value="{{$data->code}}" placeholder="Enter here" name="code">
    </div>
    <div class="mb-3 mt-3">
      <label for="decimal_digits">Decimal Digits:</label>
      <input type="text" class="form-control" id="decimal_digits" value="{{$data->decimal_digits}}" placeholder="Enter decimal digits" name="decimal_digits">
    </div>
    <div class="mb-3 mt-3">
      <label for="rounding">Rounding:</label>
      <input type="text" class="form-control" id="rounding" value="{{$data->rounding}}" placeholder="Enter here" name="rounding">
    </div>
<button type="submit" class="btn text-white" style="background-color: #1d3268">Submit</button>
  </form>
</div>
  </div>
</div>


@endsection
