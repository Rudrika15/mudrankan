@extends("Front_end.Layouts.userside")

@section('content')
<style>
  .bi-heart-fill {
      color: grey; /* Default color (empty heart) */
      transition: color 0.3s ease; /* Smooth transition for color changes */
  }

  .bi-heart-fill.active {
      color: red; /* Color when the heart is filled */
  }
</style>

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
    <div class="pimg col-md-3 col-sm-6" style="position: relative;">
      <a class="proname" href="{{route('front_end.products_details',$product->id) }}">
        <img src="{{url('proimg')}}/{{$product->image}}" class="mx-auto d-flex" data-aos="zoom-in" height="250" width="250" alt="images">
        @if (Auth::check()) 
          <div class="wicon wishlist-icon" data-aos="zoom-in" style="position: absolute;   ">
            <a href="javascript:void(0);" class="add-to-wishlist" data-product-id="{{ $product->id }}" data-id="{{ $wishlist[0]->id ?? '-' }}"> 
             
              <i class="bi bi-heart-fill {{ $wishlist->contains('product_id', $product->id) ? 'active' : '' }}" data-id="{{ $wishlist[0]->id ?? '-' }}" style="z-index: 9999; height: 20px; width: 20px; font-size: 20px;" aria-hidden="true"></i>
            </a>
          </div>  
          @else
          <div class="wicon wishlist-icon" data-aos="zoom-in" style="position: absolute;">
            <a href="{{url('myaccount')}}" class="add-to-wishlist" data-product-id="{{ $product->id }}"> 
             
              <i class="bi bi-heart-fill " style="z-index: 9999; height: 20px; width: 20px; font-size: 20px;" aria-hidden="true"></i>
            </a>
          </div> 
      @endif

        <p class="text-center py-2 ">{{$product->name}}</p>
      </a>
    </div>
    @endforeach

  </div>
  <br>
</div>

<div class="container d-flex justify-content-center p-2">
  <img src="{{asset('assets/img/page1.jpg')}}" height="590px" width="100%" alt="image">
</div>

<div class="container" >
  <h2 class="p-5 text-center text">Fresh Arrivals</h2>
  <div class="row">
    @foreach($pro as $pro)
    <div class="pimg col-md-3 col-sm-6" style="position: relative">
      <a class="proname" href="{{route('front_end.products_details',$pro->id) }}">
        <img src="{{url('proimg')}}/{{$pro->image}}" class="mx-auto d-flex" height="250" width="250" alt="images">
        @if (Auth::check()) 
          <div class="wicon wishlist-icon"  style="position: absolute; ">
            <a href="javascript:void(0);" class="add-to-wishlist" data-product-id="{{ $pro->id }}" data-id="{{ $wishlist[0]->id ?? '-' }}"> 
             
              <i class="bi bi-heart-fill {{ $wishlist->contains('product_id', $pro->id) ? 'active' : '' }}" data-id="{{ $wishlist[0]->id ?? '-' }}" style="z-index: 9999; height: 20px; width: 20px; font-size: 20px;" aria-hidden="true"></i>
            </a>
          </div>  
          @else
          <div class="wicon wishlist-icon"  style="position: absolute;  ">
            <a href="{{url('myaccount')}}" class="add-to-wishlist" data-product-id="{{ $pro->id }}"> 
             
              <i class="bi bi-heart-fill " style="z-index: 9999; height: 20px; width: 20px; font-size: 20px;" aria-hidden="true"></i>
            </a>
          </div> 
      @endif

      <p class="text-center py-2 mb-0">{{$pro->name}}</p>
        <p class="text-center py-1"> 
          <strong>Rs. {{$pro->price}}</strong>
          <small class="ms-2">
            <strike> Rs. 1500.00 </strike>
          </small>
        </p>
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
    <div class="pimg col-md-3 col-sm-6 ">
      <a class="proname" href="{{route('front_end.category')}}/{{$cat->id}}">
        <img src="{{url('/catimg')}}/{{$cat->image}}" class="mx-auto d-flex" height="250" width="250" alt="images">
        <p class="text-center py-2"><strong>{{$cat->name}}</strong>
        </p>
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
    <div class="bimg col-md-7 col-sm-6">
      <img src="{{asset('assets/img/img1.jpg')}}" height="400px" width="100%" alt="images">
    </div>
    <div class="col-md-1">
      <div class="d-flex" style="height: 400px;">
        <div class="vr"></div>
      </div>
    </div>
    <div class="bcap col-md-4">
      <div class="row">
        <div class="col-md-12 col-sm-4 pb-2">
          <div class="row">
            <div class=" col-md-6 col-sm-12">
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

      {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button> --}}
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $('.add-to-wishlist').on('click', function() {
    const product_id = $(this).data('product-id');
    const icon = $(this).find('.bi-heart-fill');
    let delete_id = icon.data('id'); 
           
    if (icon.hasClass('active')) {
      if (!delete_id) {
        alert("No wishlist item found to delete.");
        return; 
      }
   
      $.ajax({
        url: '/wishlistdelete/' + delete_id, 
        type: 'GET',
        success: function(response) {
          if (response.success) {
            icon.removeClass('active'); 
            icon.data('id', ''); 
            window.location.reload();

          } else {
            // alert(response.error); 
          }
        },
        error: function(xhr) {
          alert('An error occurred. Please try again later.');
        }
      });
    } else {
      $.ajax({
        type: 'POST',
        url: "{{ route('front_end.wishlistcode') }}",
        data: {
          _token: '{{ csrf_token() }}',
          product_id: product_id,
        },
        success: function(response) {
          if (response.success) {
            icon.addClass('active'); 
            icon.data('id', response.wishlist_id); 
            window.location.reload();
          } else {
            // alert(response.error);
          }
        },
        error: function(xhr) {
          alert('An error occurred. Please try again later.');
        }
      });
    }
  });
});
   
</script>
  
@endsection