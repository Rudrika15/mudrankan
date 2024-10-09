@extends('back_end.layout.layout')
@section('title')
Category Show
@endsection
@section('body')

<div class="container mt-3 px-5">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="card-title">Category View</h4>
        <a href="{{ route('category.create') }}" class="btn btn-bg-orange btn-sm mt-3 btn-tooltip"><i
            class="bi bi-plus-circle"></i>
          <span class="btn-text"> Add New Category</span></a>
      </div>
    
  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <p>{{ $message }}</p>
  </div>
  @endif

  <div class="table-responsive">

    <table id="myDataTable" class="table table-striped">
      <thead>
        <tr>
          <th scope="col" width="30%">{{__('Category Name')}}</th>
          <th scope="col" width="30%">{{__('Description')}}</th>
          <th scope="col" width="50%">{{__('Image')}}</th>
          <th scope="col" width="10%">{{__('Option')}}</th>
        </tr>
      </thead>
      <tbody>
        @foreach( $data as $data)
        <tr>
          <td>{{$data->name}}</td>
          <td>{!! $data->description !!}</td>

          <td><img src="{{url('catimg')}}/{{$data->image}}" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;"></td>
          <td>
            <a href="{{ url('backend/category/edit',$data->id) }}" class="btn btn-bg-blue btn-sm btn-tooltip"><i class="bi bi-pen" aria-hidden="true"></i></a>
            <a href="{{ route('category.delete',$data->id)}}" class="btn btn-bg-danger btn-sm btn-tooltip"><i class="bi bi-trash" aria-hidden="true"></i></a>
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