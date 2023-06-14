
@extends('back_end.layout.layout')
@section('title') 
Slide show 
@endsection

@section('body')

<div class="container mt-3">
<h2>{{__('Slide View')}}</h2>
@if ($message = Session::get('success'))
      
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="lead pb-2">
            Add New Slide
            <a href="{{ route('slide.create') }}" class="btn btn-primary btn-sm float-right">Add Slide</a>
        </div>
<div class="table-responsive">
  <table id="myDataTable" class="table table-striped">
    <thead>
      <tr>
        <th>{{__('Order')}}</th>
        <th>{{__('Text')}}</th>
        <th>{{__('Button')}}</th>
        <th>{{__('Text Position')}}</th>
        <th>{{__('Text Color')}}</th>
        <th>{{__('Button Color')}}</th>
        <th>{{__('Background Color')}}</th>
        <th>{{__('Indicator Color')}}</th>
        <th>{{__('Image')}}</th>
        <th>{{__('Image Fit')}}</th>
        <th>{{__('Product')}}</th>
        <th>{{__('Market')}}</th>
        <th>{{__('Enabled')}}</th>
        <th>{{__('Option')}}</th>
      </tr>
    </thead>
    <tbody>
    @foreach( $data as $data)
      <tr>
        <td>{{$data->order_id}}</td>
        <td>{{$data->text}}</td>
        <td>{{$data->button}}</td>
        <td>{{$data->text_position}}</td>
        <td>{{$data->text_color}}</td>
        <td>{{$data->button_color}}</td>
        <td>{{$data->background_color}}</td>
        <td >{{$data->indicator_color}}</td>
        <td><img src="{{url('slidimg')}}/{{$data->image}}" class="img-thumbnail" style="width:200px;height:200px"></td>
        <td>{{$data->image_fit}}</td>
        <td>{{$data->pname}}</td>
        <td>{{$data->mname}}</td>
        <td>{{$data->enabled}}</td>
        
        <td>
<a href="{{ url('backend/slide/edit',$data->id) }}"><i class="fa fa-edit" aria-hidden="true"></i></a> &nbsp;&nbsp;

<a href="{{ route('slide.delete',$data->id)}}"><span class="text-danger"><i class="fa fa-trash"  aria-hidden="true"></i></span></a> 
@endforeach
</td>
      </tr>

    </tbody>
  </table>
</div>
</div>

@endsection