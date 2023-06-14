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

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="15%">Name</th>
                <th scope="col">Email</th>
                <th scope="col" width="10%">Username</th>
                <th scope="col" width="10%">Roles</th>
                <th scope="col" width="1%" colspan="3"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->username }}</td>
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
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex">
        {!! $users->links() !!}
    </div>

</div>
@endsection