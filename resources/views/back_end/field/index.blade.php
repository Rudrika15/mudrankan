@extends('back_end.layout.layout')
@section('title')
Field Show
@endsection
@section('body')

<div class="container mt-3 px-5 px-md-5">
  <div class="card">
    <div class="card-body">
      <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-3">
        <h4 class="card-title mb-3 mb-md-0">Field View</h4>
        <a href="{{ route('field.create') }}" class="btn btn-bg-orange btn-sm mt-3 btn-tooltip"><i
          class="bi bi-plus-circle"></i>
      <span class="btn-text">Add New Field</span></a>
        </div>
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <p>{{ $message }}</p>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        {{-- <div class="lead pb-2"> --}}
        {{-- </div> --}}
        <div class="table-responsive">
          <table id="myDataTable" class="table table-striped table-hover w-100">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Option</th>
              </tr>
            </thead>
            <tbody>
              @foreach( $data as $data)
              <tr>
                <td>{{$data->name}}</td>
                <td>{!! $data->description !!}</td>
                <td>
                  <a href="{{ url('backend/field/edit',$data->id) }}" class="btn btn-bg-blue btn-sm btn-tooltip"><i class="bi bi-pen " aria-hidden="true"></i></a>
                  <button class="btn btn-bg-danger btn-sm btn-tooltip" onclick="deleteField({{ $data->id }})"><i class="bi bi-trash" aria-hidden="true"></i></button>
                  {{-- <a href="{{ route('field.delete',$data->id)}}" class="btn btn-bg-danger btn-sm btn-tooltip"><i class="bi bi-trash"
                        aria-hidden="true"></i></a> --}}
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
      text: "Do you really want to remove this item from the Field?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, remove it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = '/backend/field/delete/' + id;
      }
    })
  }
</script>
@endsection