
@extends('back_end.layout.layout')
@section('title') 
Option show 
@endsection
<style>
    .page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #1d3268 !important;
    border-color: #1d3268 !important;
}

</style>
@section('body')

<div class="container mt-3">
<h2>{{__('Option View')}}</h2>


@if ($message = Session::get('success'))
      
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="lead pb-2">
            Add New Option
            <a href="{{ route('option.create') }}" class="btn text-white btn-sm float-right" style="background-color: #1d3268">Add Option</a>
        </div>
<div class="table-responsive">
  <table id="myDataTable" class="table table-striped">
    <thead>
      <tr>
        <th>{{__('Option Name')}}</th>
        <th>{{__('Image')}}</th>
        <th>{{__('Description')}}</th>
        <th>{{__('Price')}}</th>
        <th>{{__('Product')}}</th>
        <th>{{__('Option Group')}}</th>
        <th>{{__('Options')}}</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $data)
      <tr>
        <td>{{$data->name}}</td>
        <td><img src="{{url('opimg')}}/{{$data->image}}" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;"></td>
        <td>{!! $data->description !!}</td>
        <td>{{$data->price}}</td>
        <td >{{$data->proname}}</td>
        <td >{{$data->oname}}</td>
        
        <td>
<a href="{{url('backend/option/edit',$data->id)}}"><i class="bi bi-pen" aria-hidden="true"></i></a>   &nbsp;&nbsp;
<a href="{{ route('option.delete',$data->id)}}"><span class="text-danger"><i class="bi bi-trash"  aria-hidden="true"></i></span></a> 
@endforeach
</td>
      </tr>

    </tbody>
  </table>
</div>
</div>
@endsection

