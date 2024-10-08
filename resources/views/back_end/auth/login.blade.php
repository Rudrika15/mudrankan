<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
/* Error message styling */
.error-message {
    color: red; 
    font-size: 14px; 
    margin-top: 5px; 
    display: block; 
    font-weight: normal;
}

html, body {
    height: 100%;
}

.form-bg {
    background: #F2F2F2;
}

.container {
    min-height: 100vh; /* Full viewport height */
}

.form-container {
    background: #ecf0f3;
    font-family: 'Nunito', sans-serif;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 14px 14px 20px #cbced1, -14px -14px 20px white;
}

.form-container .form-icon {
    color: #1d3268;
    font-size: 55px;
    text-align: center;
    line-height: 100px;
    width: 100px;
    height: 100px;
    margin: 0 auto 15px;
    border-radius: 50px;
    box-shadow: 7px 7px 10px #cbced1, -7px -7px 10px #fff;
}

.form-container .title {
    color: #1d3268;
    font-size: 25px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    text-align: center;
    margin: 0 0 20px;
}

.form-container .form-horizontal .form-group {
    margin: 0 0 25px 0;
}

.form-container .form-horizontal .form-group label {
    font-size: 15px;
    font-weight: 600;
    text-transform: uppercase;
}

.form-container .form-horizontal .form-control {
    color: #333;
    background: #ecf0f3;
    font-size: 15px;
    height: 50px;
    padding: 20px;
    letter-spacing: 1px;
    border: none;
    border-radius: 50px;
    box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px #fff;
    display: inline-block;
    transition: all 0.3s ease 0s;
}

.form-container .form-horizontal .form-control:focus {
    box-shadow: inset 6px 6px 6px #cbced1, inset -6px -6px 6px #fff;
    outline: none;
}

.form-container .form-horizontal .form-control::placeholder {
    color: #808080;
    font-size: 14px;
}

.form-container .form-horizontal .btn {
    color: white;
    background-color: #1d3268;
    font-size: 15px;
    font-weight: bold;
    text-transform: uppercase;
    width: 100%;
    padding: 12px 15px 11px;
    border-radius: 20px;
    box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px #fff;
    border: none;
    transition: all 0.5s ease 0s;
}

.form-container .form-horizontal .btn:hover,
.form-container .form-horizontal .btn:focus {
    color: #fff;
    letter-spacing: 3px;
    box-shadow: none;
    outline: none;
}

        /* .back {
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
        } */
    </style>
    <title>Login</title>
</head>

<body>
    {{-- <div class="back"> --}}


        {{-- <div class="div-center"> --}}

            {{-- @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show mb-0">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <p>{{ $message }}</p>
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mb-0">
                <strong>Whoops!</strong> {{__('sThere were some problems with your input')}}.<br><br>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif --}}
            {{-- <div class="content">

                <form method="post" action="{{ route('login.perform') }}">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="form-group">

                        <h1 class="mb-3 fw-normal">Login</h1>

                        <div class="mb-3 form-group">
                            <input type="text" class="form-control " name="email" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
                            <label for="floatingName">Email or Username</label>
                            @if ($errors->has('username'))
                            <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                            @endif
                        </div>

                        <div class="mb-3 form-group">
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
                            <label for="floatingPassword">Password</label>
                            @if ($errors->has('password'))
                            <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <button class="btn btn-lg btn-primary" type="submit">Login</button>
                        <br>
                        <!-- <a href="{{ route('register.perform') }}">New Register</a>    -->
                </form>

            </div>
 --}}



            <div class="form-bg">
                <div class="container d-flex justify-content-center  align-items-center min-vh-100">
                    <div class="row">
                        <div class="col-md-12 col-md-offset-12">
                            <div class="form-container">
                                <div class="form-icon"><i class="fa fa-user"></i></div>
                                <h3 class="title">Admin Login</h3>
                                <form class="form-horizontal"  method="post" action="{{ route('login.perform') }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <div class="form-group">
                                        <label>email</label>
                                        <input class="form-control" type="email" name="email" value="{{ old('email') }}" placeholder="Username" required="required" autofocus>
                                        @if($errors->has('email'))
                                        <span class="error-message">{{ $errors->first('email') }}</span>
                                        @endif
                                        @if($errors->has('auth_failed'))
                                            <span class="error-message">{{ $errors->first('auth_failed') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>password</label>
                                        <input class="form-control" type="password" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
                                    </div>
                                    <button type="submit" class="btn btn-default">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>