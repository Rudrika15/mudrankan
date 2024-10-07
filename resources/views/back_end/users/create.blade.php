@extends('back_end.layout.layout')

@section('title')
Category Create
@endsection

@section('body')


<div class="bg-light p-4 rounded">
    <h1>Add new user</h1>
    <div class="lead">
        Add new user and assign role.
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

            <button type="submit" class="btn btn-primary">Save user</button>
            <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
        </form>
    </div>

</div>
@endsection