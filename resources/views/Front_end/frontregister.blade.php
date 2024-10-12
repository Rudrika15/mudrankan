@extends("Front_end.Layouts.userside")

@section('content')

<div class="py-5">
    <div class="container p-5 shadow mb-5 bg-white rounded" style="max-width: 600px;">
        <h1 class="text-center">Register</h1>
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

    {{-- <div class="container py-3">   
        <div class="row py-3"> --}}
            {{-- <div class="col-lg-12 d-flex justify-content-center">
                <div style="padding-left: 50px; ">
                    @if ($msg = Session::get('msg'))
                    <div class="alert alert-danger">
                        <p>{{ $msg }}</p>
                    </div>
                    @endif --}}

                    <form action="{{route('front_end.registercode')}}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="firstname" id="firstname" required>
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lastname" id="lastname" required>
                        </div>
                        <div class="mb-3 ">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3 ">
                            <label for="contactNo" class="form-label">Contact No</label>
                            <input type="text" class="form-control" name="contactNo" id="contactNo" required>
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                            </div>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="userStatus" class="form-label">User Status</label>
                            <select class="form-control" name="userStatus" id="userStatus">
                                <option value="Online">Online</option>
                                <option value="Offline">Offline</option>
                            </select>
                        </div>
                        <button type="submit" class="btn reg w-100">Create</button>
                    </form>
                    <div class="py-2 text-center">
                        <a class="proname" href="{{route('front_end.myaccount')}}">Back To Login</a>
                    </div>
                {{-- </div>
            </div> --}}
        {{-- </div>
    </div> --}}
    </div>
</div>


@endsection