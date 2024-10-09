
@extends('back_end.layout.layout')
@section('title') 
Currency Show 
@endsection
@section('body')

<div class="container mt-3 px-5">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="card-title">Currency View</h4>
        <a href="{{ route('currency.create') }}" class="btn btn-bg-orange btn-sm mt-3 btn-tooltip"><i
          class="bi bi-plus-circle"></i>
      <span class="btn-text">Add New Currency</span></a>
    </div>

@if ($message = Session::get('success'))
      
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="table-responsive">
  <table id="myDataTable" class="table table-striped">
    <thead>
      <tr>
        <th scope="col" width="20%">{{__('name')}}</th>
        <th scope="col" width="20%">{{__('Symbol')}}</th>
        <th scope="col" width="20%">{{__('Code')}}</th>
        <th scope="col" width="20%">{{__('Decimal Digits')}}</th>
        <th scope="col" width="20%">{{__('Rounding')}}</th>
        <th scope="col" width="20%">{{__('Option')}}</th>
      </tr>
    </thead>
    <tbody>
    @foreach( $data as $data)
      <tr>
        <td>{{$data->name}}</td>
        <td>{{$data->symbol}}</td>
        <td>{{$data->code}}</td>
        <td>{{$data->decimal_digits}}</td>
        <td>{{$data->rounding}}</td>
        <td>
<a href="{{ url('backend/currency/edit',$data->id) }}" class="btn btn-bg-blue btn-sm btn-tooltip"><i class="bi bi-pen" aria-hidden="true"></i></a> 
<a href="{{ route('currency.delete',$data->id)}}" class="btn btn-bg-danger btn-sm btn-tooltip"><i class="bi bi-trash"  aria-hidden="true"></i></a> 
@endforeach
</td>
      </tr>

    </tbody>
  </table>
</div>
    </div>
</div>
</div>

@endsection