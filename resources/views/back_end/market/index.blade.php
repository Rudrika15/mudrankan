
@extends('back_end.layout.layout')
@section('title') 
Category Show 
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
<h2>Market View</h2>


@if ($message = Session::get('success'))
      
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="lead pb-2">
            Add New Market
            <a href="{{ route('market.create') }}" class="btn text-white btn-sm float-right" style="background-color: #1d3268">Add Market</a>
        </div>
<div class="table-responsive">
  <table id="myDataTable" class="table table-striped">
    <thead>
      <tr>
        <th>{{__('Category Name')}}</th>
        <th>{{__('Description')}}</th>
        <th>{{__('Address')}}</th>
        <th>{{__('Longitude')}}</th>
        <th>{{__('Latitude')}}</th>
        <th>{{__('Phone')}}</th>
        <th>{{__('Mobile')}}</th>
        <th>{{__('Information')}}</th>
        <th>{{__('Admin Commision')}}</th>
        <th>{{__('Delivery Fee')}}</th>
        <th>{{__('Delivery Range')}}</th>
        <th>{{__('Default Tax')}}</th>
        <th>{{__('Close')}}</th>
        <th>{{__('Active')}}</th>
        <th>{{__('Available For Delivery')}}</th>
        <th>{{__('Option')}}</th>
      </tr>
    </thead>
    <tbody>
    @foreach( $data as $data)
      <tr>
        <td>{{$data->name}}</td>
        <td>{!! $data->description !!}</td>
        <td>{!!$data->address!!}</td>
        <td>{{$data->longitude}}</td>
        <td>{{$data->latitude}}</td>
        <td>{{$data->phone}}</td>
        <td>{{$data->mobile}}</td>
        <td>{!!$data->information!!}</td>
        <td>{{$data->admin_commision}}</td>
        <td>{{$data->delivery_fee}}</td>
        <td>{{$data->delivery_range}}</td>
        <td>{{$data->default_tax}}</td>
        <td>{{$data->close}}</td>
        <td>{{$data->active}}</td>
        <td>{{$data->available_for_delivery}}</td>
        <td>
<a href="{{ url('backend/market/edit',$data->id) }}"><i class="bi bi-pen" aria-hidden="true"></i></a> &nbsp;&nbsp;
<a href="{{ route('market.delete',$data->id)}}"><span class="text-danger"><i class="bi bi-trash"  aria-hidden="true"></i></span></a> 
@endforeach
</td>
      </tr>

    </tbody>
  </table>
</div>
</div>

@endsection