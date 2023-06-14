@extends('back_end.layout.layout')
@section('title')
Channel Show
@endsection

@section('body')

<div class="container mt-3">
  <h2>{{__('Channel View')}}</h2>




  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <p>{{ $message }}</p>
  </div>
  @endif

  <div class="lead pb-2">
    Add New Channel
    <a href="{{ route('channel.create') }}" class="btn btn-primary btn-sm float-right">Add Channel</a>
  </div>
  <div class="table-responsive">

    <table id="myDataTable" class="table table-striped">
      <thead>
        <tr>
          <th>{{__('Name')}}</th>
          <th>{{__('Address')}}</th>
          <th>{{__('city')}}</th>
          <th>{{__('Aadhar card')}}</th>
          <th>{{__('Pan Card')}}</th>
          <th>{{__('Contact Number')}}</th>
          <th>{{__('Partnership')}}</th>
          <th>{{__('URL')}}</th>
          <th>{{__('Option')}}</th>
        </tr>
      </thead>
      <tbody>
        @foreach( $data as $data)
        <tr>
          <td>{{$data->name}}</td>
          <td>{!! $data->address !!}</td>
          <td>{{$data->city}}</td>
          <td>{{$data->aadharcard}}</td>
          <td>{{$data->pancard}}</td>
          <td>{{$data->contact}}</td>
          <td>{{$data->partnership}}</td>
          <td>{{$data->url}}</td>
          <td>
            <a href="{{ url('backend/channel/edit',$data->id) }}"><i class="fa fa-edit" aria-hidden="true"></i></a> &nbsp;&nbsp;
            <a href="{{ route('channel.delete',$data->id)}}"><span class="text-danger"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
            @endforeach
          </td>
        </tr>

      </tbody>
    </table>
  </div>
</div>
@endsection