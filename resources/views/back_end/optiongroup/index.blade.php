
@extends('back_end.layout.layout')
@section('title') 
Optiongroup show 
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
<h2>{{__('Option Group View')}}</h2>

@if ($message = Session::get('success'))
      
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="lead pb-2">
            Add New OptionGroup
            <a href="{{ route('optiongroup.create') }}" class="btn text-white btn-sm float-right" style="background-color: #1d3268">Add Optiongroup</a>
        </div>
<div class="table-responsive">
  <table id="myDataTable" class="table table-striped">
    <thead>
      <tr>
        <th>{{__('Name of Group')}}</th>
        <th>{{__('Options')}}</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $data)
      <tr>
        <td>{{$data->name}}</td>
        <td>
<a href="{{ url('backend/optiongroup/edit',$data->id) }}"><i class="bi bi-pen" aria-hidden="true"></i></a>  &nbsp;&nbsp;
<a href="{{ url('backend/optiongroup/delete',$data->id)}}"><span class="text-danger"><i class="bi bi-trash"  aria-hidden="true"></i></span></a> 
@endforeach
</td>
      </tr>

    </tbody>
  </table>
</div>
</div>
@endsection