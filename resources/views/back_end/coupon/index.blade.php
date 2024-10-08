
@extends('back_end.layout.layout')
@section('title') 
Coupon show 
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
<h2>{{__('coupon View')}}</h2>


@if ($message = Session::get('success'))
      
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
    <div class="lead pb-2">
            Add New Coupon
            <a href="{{ route('coupon.create') }}" class="btn text-white btn-sm float-right" style="background-color: #1d3268">Add Coupon</a>
        </div>
<div class="table-responsive">
  <table id="myDataTable" class="table table-striped">
    <thead>
      <tr>
        <th>{{__('Coupon Code')}}</th>
        <th>{{__('Discount Type')}}</th>
        <th>{{__('Discount')}}</th>
        <th>{{__('Description')}}</th>
        <th>{{__('Product')}}</th>
        <th>{{__('Markets')}}</th>
        <th>{{__('Categories')}}</th>
        <th>{{__('Expires At')}}</th>
        <th>{{__('Options')}}</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $data)
      <tr>
        <td>{{$data->code}}</td>
        <td>{{$data->discount_type}}</td>
        <td>{{$data->discount}}</td>
        <td>{!! $data->discription !!}</td>
        <td>
          @if ($data->products->isNotEmpty())
          @foreach ($data->products as $product)
              {{ $product->name }}
          @endforeach
          @else
              -
          @endif
            </td>
        <td>
          @if ($data->markets->isNotEmpty())
          @foreach ($data->markets as $market)
          {{$market->name}}
          @endforeach
          @else
            -
          @endif
        </td>
        <td>
          @if ($data->categories->isNotEmpty())
          @foreach ($data->categories as $category)
          {{$category->name}}
          @endforeach
          @else
            -
          @endif
        </td>
        <td >{{$data->expires_at}}</td>
        
        <td>
<a href="{{url('backend/coupon/edit',$data->id)}}"><i class="bi bi-pen" aria-hidden="true"></i></a>   &nbsp;&nbsp;
<a href="{{ route('coupon.delete',$data->id)}}"><span class="text-danger"><i class="bi bi-trash"  aria-hidden="true"></i></span></a> 
@endforeach
</td>
      </tr>

    </tbody>
  </table>
</div>
</div>
@endsection

