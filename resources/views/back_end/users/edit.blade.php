@extends('back_end.layout.layout')

@section('title')
Update User
@endsection

@section('body')

<div class="bg-light p-4 rounded">
    <h1>Update user</h1>
    <div class="lead">

    </div>

    <div class="container mt-4">
        <form method="post" action="{{ route('users.update', $user->id) }}">
            @csrf
            <input type="hidden" name="id" id="id" value="{{$user->id}}">
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input value="{{ $user->firstName }}" type="text" class="form-control" name="firstName"
                    placeholder="First Name" required>

                @if ($errors->has('firstName'))
                <span class="text-danger text-left">{{ $errors->first('firstName') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input value="{{ $user->lastName }}" type="text" class="form-control" name="lastName"
                    placeholder="Last Name" required>

                @if ($errors->has('lastName'))
                <span class="text-danger text-left">{{ $errors->first('lastName') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input value="{{ $user->email }}" type="email" class="form-control" name="email"
                    placeholder="Email address" required>
                @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="contactNo" class="form-label">Contact No</label>
                <input value="{{ $user->contactNo }}" type="contactNo" class="form-control" name="contactNo"
                    placeholder="Contact No" required>
                @if ($errors->has('contactNo'))
                <span class="text-danger text-left">{{ $errors->first('contactNo') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-control" name="role" required>
                    <option value="">Select role</option>
                    @foreach($roles as $role)
                    <option value="{{ $role->name }}" {{ in_array($role->name, $userRole)
                        ? 'selected'
                        : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('role'))
                <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update user</button>
            <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</button>
        </form>
    </div>

</div>
@endsection