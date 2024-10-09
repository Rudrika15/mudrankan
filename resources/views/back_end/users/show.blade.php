@extends('back_end.layout.layout')
@section('title') 
Category Create
@endsection

@section('body')

<div class="container mt-3 px-5">
    <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title">Show user</h4>
            <a href="{{route('users.index')}}" class="btn text-white" style="background-color: #e76a35">Back </a>
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
    {{-- <div class="container mt-4 mb-2"> --}}
        {{-- <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info text-white" style="background-color: #1d3268">Edit</a> --}}
        {{-- <a href="{{ route('users.index') }}" class="btn btn-default text-white" style="background-color: #e76a35">Back</a> --}}
    {{-- </div> --}}
    </div>
</div>
@endsection