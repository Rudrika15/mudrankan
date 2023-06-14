<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') Mudrankan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;1,700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="{{asset('assets/css/style1.css')}}" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".btn").click(function() {
                $("#div1").fadeIn();
                $("#div2").fadeIn("slow");
                $("#div3").fadeIn(3000);
            });
        });
    </script>
</head>

<body>

    <div class="top">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div class=""></div>
                <div class="">Place Order on Whatsapp -+91 9999 999999</div>
                <div class="">
                    <a href="" class="navtop"><i class="bi bi-youtube"></i></a>
                    <a href="" class="navtop"><i class="bi bi-instagram "></i></a>
                    <a href="" class="navtop"><i class="bi bi-facebook "></i></a>
                    <a href="" class="navtop"><i class="bi bi-twitter "></i></a>
                    <a href="" class="navtop"><i class="bi bi-pinterest "></i></a>
                </div>
            </div>

        </div>
    </div>
    @include('Front_end.menu')
    @yield('content')

    <div class="py-1">
        <footer class="footer">
            <div class="container ">
                <div class="row ">
                    <div class="col-md-3 ">
                        <b class="d-flex justify-content-center">Quick Links</b>
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item ">Search</li>
                            <li class="list-group-item">Privacy Policy</li>
                            <li class="list-group-item">Terms & Conditions</li>
                            <li class="list-group-item">Disclaimer</li>
                            <li class="list-group-item">Corporate Gifting</li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <b class="d-flex justify-content-center">Help Menu</b>
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item ">Contact Us</li>
                            <li class="list-group-item">Track Your Order</li>
                            <li class="list-group-item">Return & Exchange</li>
                            <li class="list-group-item">About Us</li>
                            <li class="list-group-item">Blogs</li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <b class="d-flex justify-content-center">Shop</b>
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item ">Search</li>
                            <li class="list-group-item">Privacy Policy</li>
                            <li class="list-group-item">Terms & Conditions</li>
                            <li class="list-group-item">Disclaimer</li>
                            <li class="list-group-item">Corporate Gifting</li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <div class="row">
                            <div class="col-md-6">
                                <b class="d-flex justify-content-center">Get in touch</b>
                                <ul class="list-group list-group-flush text-center">
                                    <li class="list-group-item "><i class="bi bi-telephone"></i> +919999999999</li>
                                    <li class="list-group-item"><i class="bi bi-envelope"></i>www.mudrankan.com</li>
                                    <li class="list-group-item"> <b> Follow Us </b></li>
                                    <li class="list-group-item">
                                        <i class="bi bi-youtube"></i>
                                        <i class="bi bi-instagram "></i>
                                        <i class="bi bi-facebook "></i>
                                        <i class="bi bi-twitter "></i>
                                        <i class="bi bi-pinterest "></i>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <b class="d-flex justify-content-center">We Accept</b>
                                <ul class="list-group list-group-flush text-center">
                                    <li class="list-group-item ">visa</li>
                                    <li class="list-group-item">Master</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

</body>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>


<script>
    function readURL(input, tgt) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector(tgt).setAttribute("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


</html>