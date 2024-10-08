
@extends('back_end.layout.layout')
@section('title') 
Productgallery show 
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
  

@if ($message = Session::get('success'))
      
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="lead pb-2">
  Add New Product gallery
  <a href="{{ route('productgallery.create') }}" class="btn text-white btn-sm float-right" style="background-color: #1d3268">Add New Product gallery</a>
</div>
<div class="table-responsive">
  <table id="myDataTable" class="table table-striped">
    <thead>
      <tr>
        <th>{{__('Product')}}</th>
        <th>{{__('Image')}}</th>
        <th>{{__('Options')}}</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $data)
      <tr>
        <td>
          {{$data->product->name ?? '-'}}
        </td>
        <td><img src="{{url('progaimg')}}/{{$data->image}}" class="img-thumbnail" style="width:100px;height:100px"></td>
       <td>
<a href="{{ url('backend/productgallery/edit',$data->id) }}"><i class="bi bi-pen" aria-hidden="true"></i></a>   &nbsp;&nbsp;
<a href="{{ route('productgallery.delete',$data->id)}}"><span class="text-danger"><i class="bi bi-trash"  aria-hidden="true"></i></span></a> 
@endforeach
</td>
      </tr>

    </tbody>
  </table>
</div>
</div>
@endsection