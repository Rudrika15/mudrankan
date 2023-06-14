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
     <div class="container py-5">
          <p class="text text-center w-100 h3">Login</p>
          <div class="row py-3">
               <div class="col-lg-11 d-flex justify-content-center">
                    <div style="padding-left: 50px; ">
                         @if ($msg = Session::get('msg'))
                         <div class="alert alert-danger">
                              <p>{{ $msg }}</p>
                         </div>
                         @endif

                         <form action="{{route('front_end.logincodee')}}" method="post">
                              @csrf

                              <div class="mb-3 ">
                                   <label for="exampleInputEmail1" class="form-label">Email address</label>
                                   <input type="email" class="form-control" style="width: 150%;" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                              <div class="mb-3">
                                   <div class="d-flex justify-content-between">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                   </div>
                                   <input type="password" name="password" class="form-control" style="width: 150%;" id="exampleInputPassword1">
                              </div>
                              <div class="mb-3 form-check">
                                   <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                   <label class="form-check-label" for="exampleCheck1">Check me out</label>
                              </div>
                              <button type="submit" style="width: 150%;" class="btn reg form-control">Submit</button>
                              <small class=""><a href="#" class="text-danger fw-light ">Forgot Password</a></small>
                         </form>
                         <div class="py-2"></div>
                         <a class="proname" href="{{route('front_end.register')}}">Create account</a>
                    </div>
               </div>
          </div>
     </div>
</div>


@endsection