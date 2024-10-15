@extends('back_end.layout.layout')
@section('title') 
Pemission Create
@endsection

@section('body')

    <div class="container mt-3 px-5">
        <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="card-title"> Manage your permissions here</h4>
                <a href="{{ route('permissions.create') }}" class="btn btn-bg-orange btn-sm mt-3 btn-tooltip"><i
                  class="bi bi-plus-circle"></i>
              <span class="btn-text">Add New role</span></a>
            </div>
        
        
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Guard</th> 
                <th scope="col" colspan="3" width="1%">Action</th> 
            </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                        <td><a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-bg-blue btn-sm btn-tooltip"><i class="bi bi-pen" aria-hidden="true"></i></a></td>
                        <td>
                            <button class="btn btn-bg-danger btn-sm btn-tooltip" onclick="deleteField({{ $permission->id }})"><i class="bi bi-trash" aria-hidden="true"></i></button>

                        {{-- <a href="{{ route('permissions.destroy', $permission->id) }}" class="btn btn-bg-danger btn-sm btn-tooltip"><i class="bi bi-trash"  aria-hidden="true"></i></a> --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
        </div>
    </div>
<script>
  function deleteField(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you really want to remove this item from the Permission?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, remove it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = '/backend/permissions/' + id;
      }
    })
  }
</script>
    
@endsection