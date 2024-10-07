@extends('back_end.layout.layout')
@section('title')
Category Create
@endsection

@section('body')


<div class="bg-light p-4 rounded">
    <h1>Users</h1>
    <div class="lead pb-2">
        Add New Users.
        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right">Add User</a>
    </div>

    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th scope="col" width="1%">No</th>
                <th scope="col" width="10%">First Name</th>
                <th scope="col" width="10%">Last Name</th>
                <th scope="col" width="15%">Email</th>
                <th scope="col" width="10%">Roles</th>
                <th scope="col" width="5%" colspan="3">Action</th>
                <th scope="col" width="5%" colspan="2">Assign Role</th>

            </tr>
        </thead>
        <tbody>
            @foreach($users as $index=>$user)
            <tr>
                
                <th scope="row">{{ $index + 1  }}</th>
                <td>{{ $user->firstName }}</td>
                <td>{{ $user->lastName }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach($user->roles as $role)
                    <span class="badge bg-primary">{{ $role->name }}</span>
                    @endforeach
                </td>
                <td><a href="{{ route('users.show', $user->id) }}"><i class="bi bi-eye"></i></a></td>
                <td><a href="{{ route('users.edit', $user->id) }}"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                <td>
                    <a href="{{ route('users.destroy', $user->id) }}"><span class="text-danger"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                </td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm btn-tooltip"
                    data-bs-toggle="modal"
                    data-bs-target="#assignRoleModal{{ $user->id }}"><i
                        class="bi bi-person-plus"></i>
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
                                    <input type="hidden" name="userId"
                                        value="{{ $user->id }}">
                                    <select name="roleId" class="form-select">
                                        <option value="">Select Role</option>
                                        @foreach ($roles as $role)
                                            @if (
                                                !in_array($role->name, ['Franchise Admin', 'Member', 'Admin', 'Trainer']) &&
                                                    !$user->roles->contains($role->id))
                                                <option value="{{ $role->id }}">
                                                    {{ $role->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    <div class="d-flex justify-content-end mt-3">
                                        <button type="submit"
                                            class="btn btn-bg-blue btn-sm">Assign</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </td>
                <td>
                    <button type="button" class="btn btn-danger btn-sm btn-tooltip"
                    data-bs-toggle="modal"
                    data-bs-target="#removeRoleModal{{ $user->id }}"><i
                        class="bi bi-trash"></i>
                    <span class="btn-text">Remove Role</span>
                </button>
                  {{-- //remove role modal --}}

              <div class="modal fade" id="removeRoleModal{{ $user->id }}"
                  data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                  aria-labelledby="removeRoleModalLabel" aria-hidden="true">
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
                                  <input type="hidden" name="userId"
                                      value="{{ $user->id }}">
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
                                          class="btn btn-bg-orange btn-sm">Remove</button>
                                  </div>
                              </form>
                          </div>
                      </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex">
        {!! $users->links() !!}
    </div>

</div>
@endsection