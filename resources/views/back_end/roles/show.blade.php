
@extends('back_end.layout.layout')
@section('title') 
Category Create
@endsection

@section('body')

<div class="container mt-3 px-5">
    <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title">Show Role</h4>
            <a href="{{route('roles.index')}}" class="btn text-white" style="background-color: #e76a35">Back </a>
          </div>

        
        <div class="container mt-4">
            {{-- <div class="d-flex flex-row-reverse">
                <a href="{{route('roles.index')}}" class="btn text-white" style="background-color: #e76a35">{{__('Back')}} </a>    
              </div>           --}}

            {{-- <h3>Assigned permissions</h3> --}}

            <table class="table table-striped">
                <thead>
                    <th scope="col" width="20%">Name</th>
                    <th scope="col" width="1%">Guard</th> 
                </thead>

                @foreach($rolePermissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
    {{-- <div class="mt-4">
        <a href="{{ route('roles.edit', $role->id) }}" class="btn text-white" style="background-color: #1d3268">Edit</a>
        {{-- <a href="{{ route('roles.index') }}" class="btn btn-default">Back</a> --}}
    {{-- </div> --}} 
@endsection