@extends('back_end.layout.layout')
@section('title') 
Productgallery show 
@endsection
@section('body')

<div class="container mt-3 px-5">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="card-title">Product gallery View</h4>
        <div class="d-flex gap-2">
          <a href="{{ route('productgallery.create') }}" class="btn btn-bg-orange btn-sm mt-3 btn-tooltip d-flex align-items-center"><i
            class="bi bi-plus-circle"></i>
          <span class="btn-text"> Add New Product gallery</span></a>
          <a href="{{route('product.show')}}" class="btn text-white d-flex align-items-center" style="background-color: #e76a35">Back </a>
      </div>
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
        <th scope="col" width="50%">{{__('Product')}}</th>
        <th scope="col" width="50%">{{__('Image')}}</th>
        <th scope="col" width="50%">{{__('Options')}}</th>
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
<a href="{{ url('backend/productgallery/edit',$data->id) }}" class="btn btn-bg-blue btn-sm btn-tooltip"><i class="bi bi-pen" aria-hidden="true"></i></a> 
<a href="{{ route('productgallery.delete',$data->id)}}" class="btn btn-bg-danger btn-sm btn-tooltip"><i class="bi bi-trash"  aria-hidden="true"></i></a> 
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