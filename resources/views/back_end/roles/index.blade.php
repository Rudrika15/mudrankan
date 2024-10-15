
@extends('back_end.layout.layout')

@section('title') 
Category Create
@endsection
@section('body')

    <div class="container mt-3 px-5">
        <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="card-title">Roles</h4>
                <a href="{{ route('roles.create') }}" class="btn btn-bg-orange btn-sm mt-3 btn-tooltip"><i
                  class="bi bi-plus-circle"></i>
              <span class="btn-text">Add New role</span></a>
            </div>
            
        
        
        <table class="table table-striped">
          <tr>
             <th>No</th>
             <th>Name</th>
             <th width="3%" colspan="3">Action</th>
          </tr>
            @foreach ($roles as $key => $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a href="{{ route('roles.show', $role->id) }}" class="btn btn-bg-warning btn-sm btn-tooltip"><i class="bi bi-eye"></i></a>
                </td>
                <td>
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-bg-blue btn-sm btn-tooltip"><i class="bi bi-pen" aria-hidden="true"></i></a>
                </td>
                <td>
                    <button class="btn btn-bg-danger btn-sm btn-tooltip" onclick="deleteField({{ $role->id }})"><i class="bi bi-trash" aria-hidden="true"></i></button>

                {{-- <a href="{{ route('roles.destroy', $role->id) }}" class="btn btn-bg-danger btn-sm btn-tooltip"><i class="bi bi-trash"  aria-hidden="true"></i></a></td> --}}
            </tr>
            @endforeach
        </table>

        <div class="d-flex justify-content-end">
            {!! $roles->links() !!}
        </div>

    </div>
        </div>
    </div>
<script>
  function deleteField(id) {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you really want to remove this item from the Role?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, remove it!'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href = '/backend/roles/' + id;
      }
    })
  }
</script>
      
    
@endsection