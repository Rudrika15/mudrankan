@extends("Front_end.Layouts.userside")

@section('content')

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php
    $i = 0;
    foreach ($slide as $slide) {
      $i++;
      if ($i == 1) {
    ?>
        <div class="carousel-item active">
          <img src="{{url('slidimg')}}/{{$slide->image}}" class="d-block" width="100%" height="500px" alt="slider image">
        </div>
      <?php } else { ?>
        <div class="carousel-item">
          <img src="{{url('slidimg')}}/{{$slide->image}}" class="d-block" width="100%" height="500px" alt="slider image">
        </div>
    <?php

      }
    }
    ?>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

<div class="container">
  <h2 class="p-5 text-center text">Shop By Collection</h2>
  <div class="row">
    @foreach($product as $product)
    <div class="col-md-3 col-sm-6">
      <a class="proname" href="{{route('front_end.products_details',$product->id) }}">
        <img src="{{url('proimg')}}/{{$product->image}}" data-aos="zoom-in" height="250" width="250" alt="images">
        <p class="d-flex justify-content-center pe-5 py-2">{{$product->name}}</p>
      </a>
    </div>
    @endforeach

  </div>
  <br>


</div>

<div class="container d-flex justify-content-center p-2">
  <img src="{{asset('assets/img/page1.jpg')}}" height="590px" width="100%" alt="image">
</div>

<div class="container">
  <h2 class="p-5 text-center text">Fresh Arrivals</h2>
  <div class="row">
    @foreach($pro as $pro)
    <div class="col-md-3 col-sm-6">
      <a class="proname" href="{{route('front_end.products_details',$product->id) }}">
        <img src="{{url('proimg')}}/{{$pro->image}}" height="250" width="250" alt="images">
        <b class="">{{$pro->name}}</b>
        <span class="d-flex justify-content-around"> <span> Rs. {{$pro->price}}</span>
          <small>
            <strike> Rs. 1500.00 </strike>
          </small>
        </span>
      </a>
    </div>
    @endforeach
  </div>
</div>

<div class="container d-flex justify-content-center pt-5">
  <img src="{{asset('assets/img/img8.jpg')}}" height="600px" width="100%" alt="image">
</div>

<div class="container">
  <h2 class="p-5 text-center text">Popular Picks</h2>
  <div class="row">
    @foreach($cat as $cat)
    <div class="col-md-3 col-sm-6 text-center ">
      <a class="proname" href="{{route('front_end.products')}}/{{$cat->id}}">
        <img src="{{url('/catimg')}}/{{$cat->image}}" height="250" width="250" alt="images">
        <b class="d-flex justify-content-center">{{$cat->name}}
        </b>
      </a>
    </div>
    @endforeach
  </div>
</div>

<div class="container d-flex justify-content-center pt-5">
  <img src="{{asset('assets/img/page3.jpg')}}" height="600px" width="100%" alt="image">
</div>

<div class="container">
  <h2 class="p-5 text-center text">From the Blogs</h2>
  <div class="row">
    <div class="col-md-7 col-sm-6">
      <img src="{{asset('assets/img/img1.jpg')}}" height="600px" width="100%" alt="images">
    </div>
    <div class="col-md-1">
      <div class="d-flex" style="height: 400px;">
        <div class="vr"></div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="row">
        <div class="col-md-12 col-sm-4 pb-2">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <img src="{{asset('assets/img/img2.jpg')}}" height="100" width="200" alt="images">
            </div>
            <div class="col-md-6 col-sm-12">
              <p>How Luxurious Home Décor is Defining New-Age Luxury Homes In 2022?</p>
            </div>
          </div>

        </div>
        <div class="col-md-12 col-sm-4 pb-2">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <img src="{{asset('assets/img/img3.jpg')}}" height="100" width="200" alt="images">
            </div>
            <div class="col-md-6 col-sm-12">
              <p>How Luxurious Home Décor is Defining New-Age Luxury Homes In 2022?</p>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-sm-4 pb-2">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <img src="{{asset('assets/img/img1.jpg')}}" height="100" width="200" alt="images">
            </div>
            <div class="col-md-6 col-sm-12">
              <p>How Luxurious Home Décor is Defining New-Age Luxury Homes In 2022?</p>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>


<div class="container py-5">
  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <?php
      $i = 0;
      foreach ($bottomslide as $bottomslide) {
        $i++;
        if ($i == 1) {
      ?>

          <div class="carousel-item active">
            <div class="row">
              <div class="col-md-6">
                <img src="{{url('slidimg')}}/{{$bottomslide->image}}" height="500px" class="d-block w-100" alt="...">
              </div>
              <div class="col-md-6">
                <p style="padding-top: 250px;" class="text-center">Victorian Lady on Swing - Fine Porcelain
                  FigurineVictorian Lady
                  on Swing -
                  Fine Porcelain
                  Figurine</p>
              </div>
            </div>
          </div>
        <?php } else { ?>
          <div class="carousel-item">
            <div class="row">
              <div class="col-md-6">
                <img src="{{url('slidimg')}}/{{$bottomslide->image}}" height="500px" class="d-block w-100" alt="...">
              </div>
              <div class="col-md-6">
                <p style="padding-top: 250px;" class="text-center">Victorian Lady on Swing - Fine Porcelain
                  FigurineVictorian Lady
                  on Swing -
                  Fine Porcelain
                  Figurine</p>
              </div>
            </div>
          </div>
      <?php

        }
      }
      ?>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </div>
</div>

@endsection