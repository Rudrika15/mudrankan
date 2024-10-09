@extends('back_end.layout.layout')
@section('title')
Product show
@endsection
@section('body')

<div class="container mt-3 px-5">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="card-title">Product View</h4>
        <div class="d-flex gap-2">
        <a href="{{ route('product.create') }}" class="btn btn-bg-orange btn-sm mt-3 btn-tooltip d-flex align-items-center"><i
            class="bi bi-plus-circle"></i>
          <span class="btn-text"> Add New Product</span></a>
          <a href="{{ route('productgallery.show') }}" class="btn btn-bg-orange btn-sm mt-3 btn-tooltip d-flex align-items-center"><i
            class="bi bi-plus-circle"></i>
          <span class="btn-text"> View Product Gallery</span></a>
        </div>
      </div>

  @if ($message = Session::get('success'))

  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <p>{{ $message }}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  {{-- <div class="lead pb-2">
    Add New Product
    <a href="{{ route('product.create') }}" class="btn text-white btn-sm float-right" style="background-color: #1d3268">Add Product</a>
    <span class="flex-row-reverse"><a href="{{route('productgallery.show')}}" class="btn btn-sm text-white" style="background-color: #1d3268">View Product Gallery</a><span>
  </div> --}}

  <div class="table-responsive">
    <table id="myDataTable" class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col" width="50%">{{__('Product Name')}}</th>
          <th scope="col" width="50%">{{__('Price')}}</th>
          <th scope="col" width="50%">{{__('Discount Price')}}</th>
          {{-- <!-- <th>{{__('Description')}}</th> --> --}}
          <th scope="col" width="50%">{{__('Capacity')}}</th>
          <th scope="col" width="50%">{{__('Unit')}}</th>
          <th scope="col" width="50%">{{__('Package Count')}}</th>
          <th scope="col" width="50%">{{__('Category')}}</th>
          <th scope="col" width="50%">{{__('Market')}}</th>
          <th scope="col" width="50%">{{__('Featured')}}</th>
          <th scope="col" width="50%">{{__('Deliverable Product')}}</th>
          <th scope="col" width="50%">{{__('Image')}}</th>
          <th scope="col" width="50%">{{__('Option')}}</th>
        </tr>
      </thead>
      <tbody>
        @foreach( $data as $data)
        <tr>
          <td>{{$data->name}}</td>
          <td>{{$data->price}}</td>
          <td>{{$data->discount_price}}</td>
          <!-- <td>{!! $data->description !!}</td> -->
          <td>{{$data->capacity}}</td>
          <td>{{$data->unit}}</td>
          <td>{{$data->package_count}}</td>
          <td>{{$data->cname}}</td>
          <td>{{$data->mname}}</td>
          <td>{{$data->featured}}</td>
          <td>{{$data->deliverable_product}}</td>
          <td>
            <img src="{{url('proimg')}}/{{$data->image}}" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;">
          </td>
          <td>
            <a href="{{ url('backend/product/edit',$data->id) }}" class="btn btn-bg-blue btn-sm btn-tooltip"><i class="bi bi-pen" aria-hidden="true"></i></a>
            <a href="{{ route('product.delete',$data->id)}}" class="btn btn-bg-danger btn-sm btn-tooltip"><i class="bi bi-trash" aria-hidden="true"></i></a>
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