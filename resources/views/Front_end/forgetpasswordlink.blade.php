@extends("Front_end.Layouts.userside")

@section('content')

    <div class="container py-5">
        <div class="container p-5 shadow mb-5 bg-white rounded" style="max-width: 400px;">
            <p class="text-center h3">Reset Password</p>
                        <form action="{{ route('reset.password.post') }}" method="POST">
                            @csrf  
                            <input type="hidden" name="token" value="{{ $token }}">  
                            <div class="mb-3">
                                <label for="email_address" class="form-label">E-Mail Address</label>
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>  
                                    @if ($errors->has('email'))  
                                        <span class="text-danger">{{ $errors->first('email') }}</span>  
                                    @endif
                            </div>  
      
                            <div class="mb-3">  
                                <label for="password" class="form-label">Password</label>
                                    <input type="password" id="password" class="form-control" name="password" required autofocus>
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                            </div>
    
                            <div class="mb-3">
                                <label for="password-confirm" class="form-label">Confirm Password</label>
                                    <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus>
                                    @if ($errors->has('password_confirmation'))
                                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                    @endif
                            </div>
  
                            <button type="submit" class="btn reg  w-100"> Reset Password</button>  
                        </form>
        </div>  
    </div>

@endsection