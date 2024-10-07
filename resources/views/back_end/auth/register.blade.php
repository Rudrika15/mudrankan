<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Register</title>
    <style>
.back {
  background: #e2e2e2;
  width: 100%;
  position: absolute;
  top: 0;
  bottom: 0;
}

.div-center {
  width: 400px;
  height: 400px;
  background-color: #fff;
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  margin: auto;
  max-width: 100%;
  max-height: 100%;
  overflow: auto;
  padding: 1em 2em;
  border-bottom: 2px solid #ccc;
  display: table;
}

div.content {
  display: table-cell;
  vertical-align: middle;
}
</style>
</head>
<body>
<div class="back">


<div class="div-center">


  <div class="content">

<form method="post" action="{{ route('register.perform') }}">

<input type="hidden" name="_token" value="{{ csrf_token() }}" />

<h1 class="h3 mb-3 fw-normal">Register</h1>

<div class="form-group form-floating mb-3">
    <input type="text" class="form-control" name="firstname" value="{{ old('firstname') }}" placeholder="FirstName" required="required" autofocus>
    <label for="firstname">First Name</label>
    @if ($errors->has('firstname'))
        <span class="text-danger text-left">{{ $errors->first('firstname') }}</span>
    @endif
</div>

<div class="form-group form-floating mb-3">
    <input type="text" class="form-control" name="lastname" value="{{ old('lastname') }}" placeholder="LastName" required="required" autofocus>
    <label for="lastname">Last Name</label>
    @if ($errors->has('lastname'))
        <span class="text-danger text-left">{{ $errors->first('lastname') }}</span>
    @endif
</div>

<div class="form-group form-floating mb-3">
    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="name@example.com" required="required" autofocus>
    <label for="floatingEmail">Email address</label>
    @if ($errors->has('email'))
        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
    @endif
</div>

<div class="form-group form-floating mb-3">
    <input type="text" class="form-control" name="contactNo" value="{{ old('contactNo') }}" placeholder="ContactNo" required="required" autofocus>
    <label for="contactNo">Contact No</label>
    @if ($errors->has('contactNo'))
        <span class="text-danger text-left">{{ $errors->first('contactNo') }}</span>
    @endif
</div>


<div class="form-group form-floating mb-3">
    <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
    <label for="floatingPassword">Password</label>
    @if ($errors->has('password'))
        <span class="text-danger text-left">{{ $errors->first('password') }}</span>
    @endif
</div>

<div class="form-group form-floating mb-3">
    <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
    <label for="floatingConfirmPassword">Confirm Password</label>
    @if ($errors->has('password_confirmation'))
        <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
    @endif
</div>

<div class="form-group form-floating mb-3">
    <select class="form-control" name="userStatus" id="userStatus">
        <option value="Online">Online</option>
        <option value="Offline">Offline</option>
    </select>
    <label for="userStatus">User Status</label>
</div>

<button class="btn btn-lg btn-primary" type="submit">Register</button>
<br>
<a href="login">Already registered  Login.</a>   
   

</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
