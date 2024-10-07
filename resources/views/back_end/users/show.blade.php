@extends('back_end.layout.layout')
@section('title') 
Category Create
@endsection

@section('body')

<div class="bg-light p-4 rounded">
        <h1>Show user</h1>
        <div class="lead">
            
        </div>
        
        <div class="container mt-4">
            <div>
               First Name: {{ $user->firstName }}
            </div>
            <div>
                Last Name: {{ $user->lastName }}
            </div>
            <div>
                Email: {{ $user->email }}
            </div>

        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
    </div>
@endsection