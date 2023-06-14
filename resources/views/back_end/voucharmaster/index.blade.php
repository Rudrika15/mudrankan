
@extends('back_end.layout.layout')
@section('title') 
Vouchar show 
@endsection

@section('body')

<div class="container mt-3">
<h2>Vouchar View</h2>


@if ($message = Session::get('success'))
      
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="lead pb-2">
            Add New Vouchar
            <a href="{{ route('voucharmaster.create') }}" class="btn btn-primary btn-sm float-right">Add Vouchar</a>
        </div>
<div class="table-responsive">
  <table id="myDataTable" class="table table-striped">
    <thead>
      <tr>
        <th>Vouchar Name</th>
        <th>Vouchar Prize</th>
        <th>Vouchar Expiry</th>
        <th>Vouchar Associated Mobile</th>
        <th>Quantity</th>
        <th>Vouchar Status</th>
        <th>Options</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $data)
      <tr>
        <td>{{$data->vouchar_name}}</td>
        <td>{{$data->vouchar_prize}}</td>
        <td>{{$data->vouchar_expiry}}</td>
        <td>{{$data->vouchar_associated_mobile}}</td>
        <td>{{$data->quantity}}</td>
        <td>{{$data->vouchar_status}}</td>
        <td>
<a href="{{url('backend/voucharmaster/edit',$data->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a>   &nbsp;&nbsp;
<a href="{{route('voucharmaster.delete',$data->id)}}"><span class="text-danger"><i class="fa fa-trash"  aria-hidden="true"></i></span></a> 
@endforeach
</td>
      </tr>

    </tbody>
  </table>
</div>
</div>
@endsection

