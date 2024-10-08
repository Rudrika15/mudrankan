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
  <h2>{{__('Category View')}}</h2>




  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <p>{{ $message }}</p>
  </div>
  @endif

  <div class="lead pb-2">
    Add New Category
    <a href="{{ route('category.create') }}" class="btn text-white btn-sm float-right" style="background-color: #1d3268">Add Category</a>
  </div>
  <div class="table-responsive">

    <table id="myDataTable" class="table table-striped">
      <thead>
        <tr>
          <th>{{__('Category Name')}}</th>
          <th>{{__('Description')}}</th>
          <th>{{__('Image')}}</th>
          <th>{{__('Option')}}</th>
        </tr>
      </thead>
      <tbody>
        @foreach( $data as $data)
        <tr>
          <td>{{$data->name}}</td>
          <td>{!! $data->description !!}</td>

          <td><img src="{{url('catimg')}}/{{$data->image}}" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;"></td>
          <td>
            <a href="{{ url('backend/category/edit',$data->id) }}"><i class="bi bi-pen" aria-hidden="true"></i></a> &nbsp;&nbsp;
            <a href="{{ route('category.delete',$data->id)}}"><span class="text-danger"><i class="bi bi-trash" aria-hidden="true"></i></span></a>
            @endforeach
          </td>
        </tr>

      </tbody>
    </table>
  </div>
</div>
@endsection