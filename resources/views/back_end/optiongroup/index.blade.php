@extends('back_end.layout.layout')
@section('title')
Optiongroup show
@endsection
@section('body')

<div class="container mt-3 px-5">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="card-title">Option Group View</h4>
        <a href="{{ route('optiongroup.create') }}" class="btn btn-bg-orange btn-sm mt-3 btn-tooltip"><i
            class="bi bi-plus-circle"></i>
          <span class="btn-text" style=" z-index:999999999">Add New OptionGroup</span></a>
      </div>

      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif

      <div class="table-responsive">
        <table id="myDataTable" class="table table-striped table-hover">
          <thead>
            <tr>
              {{-- <th scope="col" width="100%">Name of Group</th> 
              <th class="d-flex justify-content-end" scope="col" width="100%">Options</th> --}}

              <td><b>Name of Group</b></td>
              <td class="d-flex justify-content-end"><b>Options</b></td>

            </tr>
          </thead>
          <tbody>
            @foreach ($data as $data)
            <tr>
              <td>{{$data->name}}</td>
              <td class="d-flex justify-content-end">
                <a href="{{ url('backend/optiongroup/edit',$data->id) }}" class="btn btn-bg-blue btn-sm btn-tooltip"><i
                    class="bi bi-pen" aria-hidden="true"></i></a>
                &nbsp;
                <button class="btn btn-bg-danger btn-sm btn-tooltip" onclick="deleteField({{ $data->id }})"><i
                    class="bi bi-trash" aria-hidden="true"></i></button>
                {{-- <a href="{{ url('backend/optiongroup/delete',$data->id)}}"
                  class="btn btn-bg-danger btn-sm btn-tooltip"><i class="bi bi-trash" aria-hidden="true"></i></a> --}}
              </td>
              @endforeach
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
    text: "Do you really want to remove this item from the OptionGroup?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, remove it!'
   }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = '/backend/optiongroup/delete/' + id;
    }
   })
  }
</script>

@endsection