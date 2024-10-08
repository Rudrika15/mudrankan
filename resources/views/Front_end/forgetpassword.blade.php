@extends("Front_end.Layouts.userside")

@section('content')
<div class="container-fluid py-5">
<main class="login-form">
    <div class="cotainer py-5">
        <h3 class="text-center mb-4"><i class="fa fa-lock fa-4x "></i></h3>
        <p class="text text-center w-100 h2">Reset Password</p>
        <div class="row py-3">
            <div class="col-lg-11 d-flex justify-content-center">
                <div style="padding-left: 20px; ">

                      @if (Session::has('message'))
  
                           <div class="alert alert-success" role="alert">
  
                              {{ Session::get('message') }}
  
                          </div>
  
                      @endif
  
                        <form action="{{ route('forget.password.post') }}" method="POST">
  
                            @csrf
  
                            <div class="mb-3">
  
                                <label for="email_address" class="form-label ">E-Mail Address</label>
    
                                    <input type="text" id="email_address" class="form-control" name="email"style="width: 150%;" required autofocus>
  
                                    @if ($errors->has('email'))
  
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
  
                                    @endif
    
                            </div>
  
                                <button type="submit" style="width: 150%;" class="btn reg form-control"> Send Password Reset Link</button>
                        </form>
  
            </div>
            </div>
        </div>
  
    </div>
  
  </main>
</div>
@endsection