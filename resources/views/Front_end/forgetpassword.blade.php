@extends("Front_end.Layouts.userside")

@section('content')
<div class="container py-5">
{{-- <main class="login-form"> --}}
    <div class="container p-5 shadow mb-5 bg-white rounded" style="max-width: 400px;">
        <h1 class="text-center mb-4">
            <i class="fa fa-lock fa-2x"></i>
            <span class="d-block mt-2">Reset Password</span>
       </h1>

        {{-- <h3 class="text-center mb-4"><i class="fa fa-lock fa-4x "></i></h3>
        <p class="text text-center w-100 h2">Reset Password</p> --}}
        {{-- <div class="row py-3">
            <div class="col-lg-11 d-flex justify-content-center">
                <div style="padding-left: 20px; "> --}}

                      @if (Session::has('message'))
  
                           <div class="alert alert-success alert-dismissible fade show" role="alert">
  
                              {{ Session::get('message') }}
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div>
  
                      @endif
  
                        <form action="{{ route('forget.password.post') }}" method="POST">
  
                            @csrf
  
                            <div class="mb-3">
  
                                <label for="email_address" class="form-label">E-Mail Address</label>
    
                                    <input type="email" id="email_address" class="form-control" name="email" required autofocus>
  
                                    @if ($errors->has('email'))
  
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
  
                                    @endif
    
                            </div>
  
                                <button type="submit"  class="btn reg w-100"> Send Password Reset Link</button>
                        </form>
  
            {{-- </div>
            </div>
        </div> --}}
  
    </div>
  
  {{-- </main> --}}
</div>
@endsection