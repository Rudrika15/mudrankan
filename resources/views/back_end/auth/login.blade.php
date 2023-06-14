<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    <title>Login</title>
</head>

<body>
    <div class="back">


        <div class="div-center">

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
            <div class="content">

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
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>