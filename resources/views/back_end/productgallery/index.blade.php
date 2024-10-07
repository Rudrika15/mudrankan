
@extends('back_end.layout.layout')
@section('title') 
Productgallery show 
@endsection

@section('body')


<div class="container mt-3">
  

@if ($message = Session::get('success'))
      
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<h2>{{__('Product gallery View')}}</h2>
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
<a href="{{ url('backend/productgallery/edit',$data->id) }}"><i class="fa fa-edit" aria-hidden="true"></i></a>   &nbsp;&nbsp;
<a href="{{ route('productgallery.delete',$data->id)}}"><span class="text-danger"><i class="fa fa-trash"  aria-hidden="true"></i></span></a> 
@endforeach
</td>
      </tr>

    </tbody>
  </table>
</div>
</div>
@endsection