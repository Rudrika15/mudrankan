@extends('back_end.layout.layout')
@section('title')
Category Create
@endsection
@section('body')

<div class="container mt-3 px-5">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4 class="card-title">Users</h4>
                <a href="{{ route('users.create') }}" class="btn btn-bg-orange btn-sm mt-3 btn-tooltip"><i
                        class="bi bi-plus-circle"></i>
                    <span class="btn-text" style=" z-index:999999999">Add New Users</span></a>
            </div>
            <div class="table-responsive" >
                <table id="myDataTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col" >First Name</th>
                            <th scope="col" >Last Name</th>
                            <th scope="col" >Email</th>
                            <th scope="col" >Roles</th>
                            <th scope="col"  colspan="3">Action</th>
                            <th scope="col"  colspan="2">Assign Role</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $index=>$user)
                        <tr>

                            <th scope="row">{{ $index + 1 }}</th>
                            <td>{{ $user->firstName }}</td>
                            <td>{{ $user->lastName }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach($user->roles as $role)
                                <span class="badge"  style="background-color: #1d3268">{{ $role->name }}</span>
                                @endforeach
                            </td>
                            <td><a href="{{ route('users.show', $user->id) }}" class="btn btn-bg-warning btn-sm btn-tooltip"><i class="bi bi-eye"></i></a></td>
                            <td><a href="{{ route('users.edit', $user->id) }}" class="btn btn-bg-blue btn-sm btn-tooltip"><i class="bi bi-pen"
                                        aria-hidden="true"></i></a></td>
                            <td style="padding-right: 40px;">
                                <button class="btn btn-bg-danger btn-sm btn-tooltip" onclick="deleteField({{ $user->id }})"><i class="bi bi-trash" aria-hidden="true"></i></button>

                                {{-- <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-bg-danger btn-sm btn-tooltip"><i
                                        class="bi bi-trash" aria-hidden="true"></i></a> --}}
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-tooltip" data-bs-toggle="modal" style="background-color: #1d3268"
                                onmouseover="this.style.backgroundColor='#1d3268'; this.style.color='white';" 
                                onmouseout="this.style.backgroundColor='#1d3268'; this.style.color='white';"
                                 data-bs-target="#assignRoleModal{{ $user->id }}"><i class="bi bi-person-plus"></i>
                                    <span class="btn-text">Assign Role</span>
                                </button>
                                {{-- Assign Modal --}}

                                <div class="modal fade" id="assignRoleModal{{ $user->id }}"
                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                    aria-labelledby="assignRoleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="assignRoleModalLabel">Assign Role</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('users.assignrole')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="userId" value="{{ $user->id }}">
                                                    <select name="roleId" class="form-select">
                                                        <option value="">Select Role</option>
                                                        @foreach ($roles as $role)
                                                        @if (
                                                        !in_array($role->name, ['Franchise Admin', 'Member',
                                                        'Trainer']) &&
                                                        !$user->roles->contains($role->id))
                                                        <option value="{{ $role->id }}">
                                                            {{ $role->name }}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                    <div class="d-flex justify-content-end mt-3">
                                                        <button type="submit"
                                                            class="btn btn-bg-blue btn-sm text-white"  style="background-color: #1d3268">Assign</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm btn-tooltip" data-bs-toggle="modal"
                                    data-bs-target="#removeRoleModal{{ $user->id }}"><i class="bi bi-trash"></i>
                                    <span class="btn-text">Remove Role</span>
                                </button>
                                {{-- //remove role modal --}}

                                <div class="modal fade" id="removeRoleModal{{ $user->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="removeRoleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="removeRoleModalLabel">Remove Role</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('users.removerole')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="userId" value="{{ $user->id }}">
                                                    <select name="roleId" class="form-select">
                                                        <option value="">Select Role</option>
                                                        @foreach ($user->roles as $role)
                                                        @if (!in_array($role->name, ['Member', 'Trainer', 'Admin']))
                                                        <option value="{{ $role->id }}">
                                                            {{ $role->name }}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>

                                                    <div class="d-flex justify-content-end mt-3">
                                                        <button type="submit"
                                                            class="btn bg-danger btn-sm text-white">Remove</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end">
                {!! $users->links() !!}
            </div>

        </div>
    </div>
</div>
<script>
    function deleteField(id) {
     Swal.fire({
       title: 'Are you sure?',
       text: "Do you really want to remove this item from the User?",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Yes, remove it!'
     }).then((result) => {
       if (result.isConfirmed) {
        window.location.href = '/backend/users/destroy/' + id;
       }
     })
    }
</script>
  
@endsection
