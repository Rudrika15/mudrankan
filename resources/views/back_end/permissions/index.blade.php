
@extends('back_end.layout.layout')
@section('title') 
Category Create
@endsection

@section('body')


    <div class="bg-light p-4 rounded">
        <h2>Permissions</h2>
        <div class="lead">
            Manage your permissions here.
            <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm float-right">Add permissions</a>
        </div>
        
        
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="15%">Name</th>
                <th scope="col">Guard</th> 
                <th scope="col" colspan="3" width="1%"></th> 
            </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                        <td><a href="{{ route('permissions.edit', $permission->id) }}"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
                        <td>
                        <a href="{{ route('permissions.destroy', $permission->id) }}"><span class="text-danger"><i class="fa fa-trash"  aria-hidden="true"></i></span></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@endsection