
@extends('back_end.layout.layout')
@section('title') 
Option show 
@endsection
@section('body')

<div class="container mt-3 px-5">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="card-title">Option View</h4>
        <a href="{{ route('option.create') }}" class="btn btn-bg-orange btn-sm mt-3 btn-tooltip" ><i
          class="bi bi-plus-circle"></i>
      <span class="btn-text" style=" z-index:999999999">Add New Option</span></a>
    </div>

@if ($message = Session::get('success'))
      
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="table-responsive" >
  <table id="myDataTable" class="table table-striped table-hover">
    <thead>
      <tr>
        <th scope="col" width="20%">{{__('Option Name')}}</th>
        <th scope="col" width="20%">{{__('Image')}}</th>
        <th scope="col" width="20%">{{__('Description')}}</th>
        <th scope="col" width="20%">{{__('Price')}}</th>
        <th scope="col" width="20%">{{__('Product')}}</th>
        <th scope="col" width="20%">{{__('Option Group')}}</th>
        <th scope="col" width="20%">{{__('Options')}}</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $data)
      <tr>
        <td>{{$data->name}}</td>
        <td><img src="{{url('opimg')}}/{{$data->image}}" class="img-thumbnail" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;"></td>
        <td>{!! $data->description !!}</td>
        <td>{{$data->price}}</td>
        <td >{{$data->proname}}</td>
        <td >{{$data->oname}}</td>
        
        <td>
<a href="{{url('backend/option/edit',$data->id)}}" class="btn btn-bg-blue btn-sm btn-tooltip"><i class="bi bi-pen" aria-hidden="true"></i></a>  
<button class="btn btn-bg-danger btn-sm btn-tooltip" onclick="deleteField({{ $data->id }})"><i class="bi bi-trash" aria-hidden="true"></i></button>
{{-- <a href="{{ route('option.delete',$data->id)}}" class="btn btn-bg-danger btn-sm btn-tooltip"><i class="bi bi-trash"  aria-hidden="true"></i></a>  --}}
@endforeach
</td>
      </tr>

    </tbody>
  </table>
</div>
</div>
  </div>
</div>
<script>
  function deleteField(id) {
   Swal.fire({
    title: 'Are you sure?',
    text: "Do you really want to remove this item from the Option?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, remove it!'
   }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = '/backend/option/delete/' + id;
    }
   })
  }
</script>

@endsection

