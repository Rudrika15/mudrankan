@extends("Front_end.Layouts.userside")

@section('content')

<div class="py-5">
    <div class="container p-5 shadow mb-5 bg-white rounded" style="max-width: 600px;">
        <h1 class="text-center">My Profile</h1>

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <p>{{ $message }}</p>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>Whoops!</strong> {{__('There were some problems with your input')}}.<br><br>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{route('front_end.myprofileupdate',$user->id)}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="firstname" class="form-label">First Name</label>
                <input type="text" class="form-control" name="firstname" id="firstname" value="{{$user->firstName}}">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lastname" id="lastname" value="{{$user->lastName}}">
            </div>
            <div class="mb-3 ">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}">
            </div>
            <div class="mb-3 ">
                <label for="contactNo" class="form-label">Contact No</label>
                <input type="text" class="form-control" name="contactNo" id="contactNo" value="{{$user->contactNo}}">
            </div>

            @if(Auth::user()->becomeSeller == 'no')
            <div class="mb-3">
                <input class="form-check-input" type="checkbox" id="becomeSeller" name="becomeSeller" value="yes"
                    {{$user->becomeSeller == 'yes' ? 'checked' : ''}}>
                <label for="becomeSeller">Become Seller</label>
            </div>
            @endif
            <button type="submit" class="btn reg w-100">Update</button>
        </form>
    </div>
</div>
@endsection