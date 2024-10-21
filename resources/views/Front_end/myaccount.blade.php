@extends("Front_end.Layouts.userside")

@section('content')

<div class="container py-5">
     @if ($message = Session::get('success'))
     <div class="alert alert-success alert-dismissible fade show">
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          <p>{{ $message }}</p>
     </div>
     @endif
     @if ($message = request('message'))
     <div class="alert alert-danger alert-dismissible fade show">
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         <p>{{ $message }}</p>
     </div>
     @endif
     {{-- Display error message from the session --}}
     @if ($message = Session::get('error'))
     <div class="alert alert-danger alert-dismissible fade show">
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
     <div class="container p-5 shadow mb-5 bg-white rounded" style="max-width: 400px;">
          <p class="text-center h3">Login</p>
          @if ($msg = Session::get('msg'))
          <div class="alert alert-danger">
               <p>{{ $msg }}</p>
          </div>
          @endif

                         

                         <form action="{{route('front_end.logincodee')}}" method="post">
                              @csrf
                              <div class="mb-3 ">
                                   <label for="exampleInputEmail1" class="form-label">E-Mail Address</label>
                                   <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                              <div class="mb-3">
                                   <div class="d-flex justify-content-between">
                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                   </div>
                                   <input type="password" name="password" class="form-control"  id="exampleInputPassword1">
                              </div>
                              <div class="mb-3 form-check">
                                   <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                   <label class="form-check-label" for="exampleCheck1">Check me out</label>
                              </div>
                              <button type="submit" class="btn reg  w-100">Submit</button>
                              <small class="d-block text-center mt-3"><a href="{{ route('forget.password.get') }}" class="text-danger" >Forgot Password</a></small>
                         </form>
                         <div class="text-center py-2"></div>
               </div>
</div>


@endsection