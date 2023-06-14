@extends("Front_end.Layouts.userside")

@section('content')

<div class="container-fluid py-5">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <p>{{ $message }}</p>
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
    <div class="container py-3">
        <p class="text text-center w-100 h3">Register</p>
        <div class="row py-3">
            <div class="col-lg-12 d-flex justify-content-center">
                <div style="padding-left: 50px; ">
                    @if ($msg = Session::get('msg'))
                    <div class="alert alert-danger">
                        <p>{{ $msg }}</p>
                    </div>
                    @endif

                    <form action="{{route('front_end.registercode')}}" method="post">
                        @csrf

                        <div class="mb-3 ">
                            <label for="name" class="form-label">Name</label>
                            <input type="name" class="form-control" name="name" id="name">
                        </div>
                        <div class="mb-3 ">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="exampleInputEmail1">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3 ">
                            <label for="username" class="form-label">Username</label>
                            <input type="name" class="form-control" name="username" id="username">
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                            </div>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <button type="submit" class="btn reg form-control">Create</button>
                    </form>
                    <div class="py-2">
                        <a class="proname" href="{{route('front_end.myaccount')}}">Back To Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection