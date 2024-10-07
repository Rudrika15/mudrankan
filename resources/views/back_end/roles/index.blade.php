
@extends('back_end.layout.layout')

@section('title') 
Category Create
@endsection

@section('body')

    <div class="bg-light p-4 rounded">
        <h1>Roles</h1>
        <div class="lead pb-2">
            Manage your roles here.
            <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm float-right">Add role</a>
        </div>
        
        
        
        <table class="table table-bordered table-striped">
          <tr>
             <th width="1%">No</th>
             <th>Name</th>
             <th width="3%" colspan="3">Action</th>
          </tr>
            @foreach ($roles as $key => $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a href="{{ route('roles.show', $role->id) }}"><i class="bi bi-eye"></i></a>
                </td>
                <td>
                    <a href="{{ route('roles.edit', $role->id) }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                </td>
                <td>
                <a href="{{ route('roles.destroy', $role->id) }}"><span class="text-danger"><i class="fa fa-trash"  aria-hidden="true"></i></span></a></td>
            </tr>
            @endforeach
        </table>

        <div class="d-flex">
            {!! $roles->links() !!}
        </div>

    </div>
@endsection