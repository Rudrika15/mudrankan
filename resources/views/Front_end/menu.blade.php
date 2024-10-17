<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;1,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="{{asset('assets/css/style1.css')}}" rel="stylesheet">


    <title>Mudrankan</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-white">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('front_end.index')}}"><img src="{{asset('assets/img/logo.jpg')}}" class="logo"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="menu3 navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-uppercase" aria-current="page" href="{{route('front_end.index')}}">home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-uppercase" aria-current="page" href="{{route('front_end.products')}}">products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  text-uppercase" aria-current="page" href="{{route('front_end.products')}}">coupon</a>
                    </li>

                    @foreach($categories as $category)
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{route('front_end.category')}}/{{$category->id}}">{{$category->name}} </a>
                    </li>
                    @endforeach

                    <!-- Example single danger button -->
                    <div class="btn-group">
                        <a href="" class="dropdown-toggle nav-link text-uppercase" data-bs-toggle="dropdown" aria-expanded="true">my account</a>
                        <ul class="dropdown-menu">
                            <a class="nav-link text-uppercase font text-secondary" href="{{route('front_end.wishlist')}}"><i class="bi bi-heart"></i> wishlist</a>
                            <a class="nav-link text-uppercase font text-secondary" href="{{route('front_end.viewcart')}}"><i class="bi bi-cart"></i> my cart</a>
                            <hr class="dropdown-divider">
                            @auth
                            <a class="nav-link text-uppercase text-danger" href="{{route('front_end.myprofile',Auth::user()->id)}}"><i class="bi bi-person"></i> My Profile</a>
                            @role('Seller')
                            <a class="nav-link text-uppercase text-danger" href="{{route('home.index')}}"><i class="bi bi-shop"></i> My Store</a>
                            @endrole
                            <a class="nav-link text-uppercase text-danger" href="{{route('front_end.logout')}}"><i class="bi bi-box-arrow-right"></i> logout</a>
                            @endauth
                            @guest
                            <a class="nav-link text-uppercase text-danger" href="{{route('front_end.myaccount')}}"><i class="bi bi-box-arrow-left"></i> login</a>
                            @endguest
                        </ul>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{route('front_end.about')}}">about us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="{{route('front_end.contactus')}}">contact us</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</body>

</html>