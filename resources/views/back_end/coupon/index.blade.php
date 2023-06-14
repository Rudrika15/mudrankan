
@extends('back_end.layout.layout')
@section('title') 
Coupon show 
@endsection

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
            <a href="{{ route('coupon.create') }}" class="btn btn-primary btn-sm float-right">Add Coupon</a>
        </div>
<div class="table-responsive">
  <table id="myDataTable" class="table table-striped">
    <thead>
      <tr>
        <th>{{__('Coupon')}}</th>
        <th>{{__('Discount Type')}}</th>
        <th>{{__('Discount')}}</th>
        <th>{{__('Description')}}</th>
        <th>{{__('Product')}}</th>
        <th>{{__('Markets')}}</th>
        <th>{{__('Categories')}}</th>
        <th>{{__('Expires At')}}</th>
        <th>{{__('Enabled')}}</th>
        <th>{{__('Options')}}</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $data)
      <tr>
        <td>{{$data->coupon_id}}</td>
        <td>{{$data->discount_type}}</td>
        <td>{{$data->discount_id}}</td>
        <td>{!! $data->description !!}</td>
        <td>{{$data->product_id}}</td>
        <td>{{$data->market_id}}</td>
        <td>{{$data->category_id}}</td>
        <td >{{$data->expire_at}}</td>
        <td >{{$data->enabled}}</td>
        
        <td>
<a href="{{url('backend/coupon/edit',$data->id)}}"><i class="fa fa-edit" aria-hidden="true"></i></a>   &nbsp;&nbsp;
<a href="{{ route('coupon.delete',$data->id)}}"><span class="text-danger"><i class="fa fa-trash"  aria-hidden="true"></i></span></a> 
@endforeach
</td>
      </tr>

    </tbody>
  </table>
</div>
</div>
@endsection

