@extends('back_end.layout.layout')
@section('title')
Product show
@endsection

@section('body')

<div class="container mt-3">
  <h2>{{__('Product View')}}</h2>
  @if ($message = Session::get('success'))

  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <p>{{ $message }}</p>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <div class="lead pb-2">
    Add New Product
    <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm float-right">Add Product</a>
    <span class="flex-row-reverse"><a href="{{route('productgallery.show')}}" class="btn btn-primary">View Product Gallery</a><span>
  </div>

  <div class="table-responsive">
    <table id="myDataTable" class="table table-striped">
      <thead>
        <tr>
          <th>{{__('Product Name')}}</th>
          <th>{{__('Price')}}</th>
          <th>{{__('Discount Price')}}</th>
          <!-- <th>{{__('Description')}}</th> -->
          <th>{{__('Capacity')}}</th>
          <th>{{__('Unit')}}</th>
          <th>{{__('Package Count')}}</th>
          <th>{{__('Category')}}</th>
          <th>{{__('Market')}}</th>
          <th>{{__('Featured')}}</th>
          <th>{{__('Deliverable Product')}}</th>
          <th>{{__('Image')}}</th>
          <th>{{__('Option')}}</th>
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
            <img src="{{url('proimg')}}/{{$data->image}}" class="img-thumbnail" style="width:200px;height:200px">
          </td>
          <td>
            <a href="{{ url('backend/product/edit',$data->id) }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
            &nbsp;&nbsp;
            <a href="{{ route('product.delete',$data->id)}}"><span class="text-danger"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
            @endforeach
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

@endsection