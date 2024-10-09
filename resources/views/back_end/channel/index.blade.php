@extends('back_end.layout.layout')
@section('title')
Channel Show
@endsection

</style>
@section('body')

<div class="container mt-3 px-5">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="card-title">Channel View</h4>
        <a href="{{ route('channel.create') }}" class="btn btn-bg-orange btn-sm mt-3 btn-tooltip"><i
            class="bi bi-plus-circle"></i>
          <span class="btn-text">Add New Channel</span></a>
      </div>

      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <p>{{ $message }}</p>
      </div>
      @endif

      {{-- <div class="lead pb-2">
        Add New Channel
        <a href="{{ route('channel.create') }}" class="btn text-white btn-sm float-right"
          style="background-color: #1d3268">Add Channel</a>
      </div> --}}
      <div class="table-responsive">

        <table id="myDataTable" class="table table-striped table-hover text-center">
          <thead>
            <tr>
              <th scope="col" width="10%">{{__('Name')}}</th>
              <th scope="col" width="10%">{{__('Address')}}</th>
              <th scope="col" width="10%">{{__('city')}}</th>
              <th scope="col" width="20%">{{__('Aadhar card')}}</th>
              <th scope="col" width="10%">{{__('Pan Card')}}</th>
              <th scope="col" width="20%">{{__('Contact Number')}}</th>
              <th scope="col" width="10%">{{__('Partnership')}}</th>
              <th scope="col" width="10%">{{__('URL')}}</th>
              <th scope="col" width="10%">{{__('Option')}}</th>
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
                <a href="{{ url('backend/channel/edit',$data->id) }}" class="btn btn-bg-blue btn-sm btn-tooltip"><i class="bi bi-pen" aria-hidden="true"></i></a>
                <a href="{{ route('channel.delete',$data->id)}}" class="btn btn-bg-danger btn-sm btn-tooltip"><i class="bi bi-trash"
                      aria-hidden="true"></i></a>
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