@extends('back_end.layout.layout')

@section('title')
Category Create
@endsection

@section('body')


<div class="container mt-3 px-5">
    <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title">Add new user</h4>
            <a href="{{route('users.index')}}" class="btn text-white" style="background-color: #e76a35">Back </a>
          </div>
    
    <div class="container mt-4">
        <form method="POST" action="{{ route('users.code') }}">
            @csrf
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" name="firstName" placeholder="First Name" required>

                @if ($errors->has('firstName'))
                <span class="text-danger text-left">{{ $errors->first('firstName') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lastName" placeholder="Last Name" required>

                @if ($errors->has('lastName'))
                <span class="text-danger text-left">{{ $errors->first('lastName') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email address" required>
                @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="contactNo" class="form-label">Contact No</label>
                <input type="contactNo" class="form-control" name="contactNo" placeholder="Contact No" required>
                @if ($errors->has('contactNo'))
                <span class="text-danger text-left">{{ $errors->first('contactNo') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-control" name="role" required>
                    <option value="">Select role</option>
                    @foreach($roles as $role)
                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('role'))
                <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                @endif
            </div>

            <button type="submit" class="btn text-white"  style="background-color: #1d3268">Save user</button>
        </form>
    </div>

</div>
    </div>
</div>
@endsection