
@extends('back_end.layout.layout')
@section('title') 
Currency Show 
@endsection

@section('body')

<div class="container mt-3">
<h2>{{__('Currency View')}}</h2>


@if ($message = Session::get('success'))
      
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="lead pb-2">
            Add New Currency
            <a href="{{ route('currency.create') }}" class="btn btn-primary btn-sm float-right">Add Currency</a>
        </div>
<div class="table-responsive">
  <table id="myDataTable" class="table table-striped">
    <thead>
      <tr>
        <th>{{__('name')}}</th>
        <th>{{__('Symbol')}}</th>
        <th>{{__('Code')}}</th>
        <th>{{__('Decimal Digits')}}</th>
        <th>{{__('Rounding')}}</th>
        <th>{{__('Option')}}</th>
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
<a href="{{ url('backend/currency/edit',$data->id) }}"><i class="fa fa-edit" aria-hidden="true"></i></a> &nbsp;&nbsp;
<a href="{{ route('currency.delete',$data->id)}}"><span class="text-danger"><i class="fa fa-trash"  aria-hidden="true"></i></span></a> 
@endforeach
</td>
      </tr>

    </tbody>
  </table>
</div>
</div>

@endsection