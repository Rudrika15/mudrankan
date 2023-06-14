@extends("Front_end.Layouts.userside")

@section('content')


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<div class="container pt-5">
     <div class="row ">
          <div class="col-md-6">
               <div id="carouselExampleDark" class="carousel carousel-dark slide w-100 sticky" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                         <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                         <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                         <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                         <div class="carousel-item active" data-bs-interval="10000">
                              <img src="{{url('proimg')}}/{{$product->image}}" class="d-block w-100" alt="img">

                         </div>
                         <div class="carousel-item" data-bs-interval="2000">
                              <img src="{{url('proimg')}}/{{$product->image}}" class="d-block w-100" alt="img">

                         </div>
                         <div class="carousel-item">
                              <img src="{{url('proimg')}}/{{$product->image}}" class="d-block w-100" alt="img">

                         </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                         <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                         <span class="carousel-control-next-icon" aria-hidden="true"></span>
                         <span class="visually-hidden">Next</span>
                    </button>
               </div>
          </div>
          <div class="col-md-6 overflow-auto">
               <a href="{{route('front_end.index')}}" class="text-dark" style="text-decoration: none;"> Home</a> /
               <a href="{{route('front_end.products')}}" class="text-dark" style="text-decoration: none;"> Product</a> /
               <a href="#" class="text-dark" style="text-decoration: none;"> Product Detail </a>/

               <div class="row pt-3">
                    <div class="col md-12">
                         <h2 class="p-1">{{$product->name}}</h2>
                    </div>
                    <div class="col-md-12">
                         <div class="row">
                              <div class="col-md-5">
                                   <h5 class="p-1"><i> ₹{{$product->price}}</i>
                                        <small>
                                             <strike> Rs. 1500.00 </strike>
                                        </small>
                                   </h5>
                              </div>
                              <div class="col-md-2">
                                   <span class="text-danger">Save 13%</span>
                              </div>
                         </div>
                    </div>
                    <div class="col-md-12">
                         <small>Tax Included</small>
                    </div>
                    <div class="col-md-12">

                    </div>
                    <div class="col-md-12 pt-4">
                         <h6> <b><i class="bi bi-truck"></i></b> Free Shipping & Sturdy Packaging</h6>
                    </div>
                    <div class="col-md-12">
                         <h6> <b><i class="bi bi-check2-circle"></i></b> Shipping within 24 Hours of Order Placement</h6>
                    </div>
                    <div class="col-md-12">
                         <h6> <b> <i class="bi bi-box-seam"></i> </b> Apply Discount Code - SUMMER15</h6>
                    </div>
                    <div class="col-md-12">
                         <h6> <b><i class="bi bi-globe"></i></b> For Any Queries, Call or Whtsapp at: +91 9999999999</h6>
                    </div>
                    <div class="col-md-12">

                         <span style="color: #F5B539;">
                              <i class="bi bi-dot h1"></i>Only 1 item in stock
                         </span>
                    </div>
                    <div class="col-md-12">
                         <a href="{{route('front_end.cartcode',$product->id)}}" class="cart text-center form-control">Add to Cart</a>
                         <!-- <button class="form-control" type="submit">Add to cart</button> -->
                    </div>

                    <div class="col-md-12 pt-3">
                         <a href="#" class="buy text-center form-control">Buy it Now</a>
                    </div>
                    <div class="col-md-12 pt-4">
                         <p>This lively décor sculpture will illuminate any room, its elegant shape radiates finesse and
                              beauty. Naturally eye catching this sculpture could transform your living room, bedroom,
                              kitchen, office into a work of art! Home Décor Statues, Figurines, Ornaments for Office,
                              Bedroom, Living room Minimalist Sculptures, Home Décor Figurines, Shabby Chic Home Décor</p>
                    </div>
                    <div class="col-md-12 pt-3">
                         <b>Details:</b>
                         <p>{!!$product->description!!}</p>
                    </div>
                    <div class="col-md-12 pt-3">
                         <p><b>Ready to dispatch within 24 hours</b>
                              (Applicable on orders placed on weekdays. Orders placed on
                              weekend will be dispatched on the next working day)
                              Shipment Cost: Free (India)
                              Rest of the world (will be added at checkout)</p>
                         Disclaimer: These all are representative images and actual product might vary slightly.
                         Return & exchange: Only against manufacturing defects or if damaged product received.
                    </div>
                    <div class="col-md-12 pt-3">
                         <div class="row">
                              <div class="col-md-3">
                                   <i class="bi bi-facebook"></i> Facbook
                              </div>
                              <div class="col-md-3">
                                   <i class="bi bi-twitter"></i> twitter
                              </div>
                              <div class="col-md-3">
                                   <i class="bi bi-pinterest"></i> pinterest
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>

<div class="acc container py-4">
     <div class="accordion" id="accordionFlushExample">
          <div class="border-bottom">
               <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                         <h5 class="qus">Ask a Question</h5>
                    </button>
               </h2>
               <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                         <form>
                              <div class="mb-3">
                                   <label for="exampleInputEmail1" class="form-label">Email address</label>
                                   <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                   <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                   </div>
                              </div>
                              <div class="mb-3">
                                   <label for="exampleInputPassword1" class="form-label">Password</label>
                                   <input type="password" class="form-control" id="exampleInputPassword1">
                              </div>
                              <div class="mb-3 form-check">
                                   <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                   <label class="form-check-label" for="exampleCheck1">Check me out</label>
                              </div>
                              <button type="submit" class="btn sub">Submit</button>
                         </form>
                    </div>
               </div>
          </div>
     </div>
</div>



<div class="container border pt-5">
     <div class="d-flex justify-content-between">
          <div class="first pb-5">
               <h2><i>Customer Review</i></h2>
               <i class="bi bi-star"></i>
               <i class="bi bi-star"></i>
               <i class="bi bi-star"></i>
               <i class="bi bi-star"></i>
               <i class="bi bi-star"></i>
               <small class="ps-1">Be the first to write a review</small>
          </div>
          <div class="second">
               <button id="button" class="btn">View Review</button><br><br>
          </div>
     </div>


     <div class="container">
          <div id="div3" style="display:none;">



               <hr>
               <form class="row g-3" action="{{route('front_end.review')}}" method="post">
                    @csrf
                    <input type="hidden" value="{{request('id')}}" name="product_id">
                    <div class="col-md-12">
                         <b><label for="inputEmail4" class="form-label">Name (displayed publicly like
                                   <select name="" id="">
                                        <option value="">John Smith</option>
                                        <option value="">John S.</option>
                                        <option value="">J.S.</option>
                                        <option value="">Anonymous</option>
                                   </select> )</label></b>
                         <input type="text" name="username" class="form-control" id="username" require>
                    </div>
                    <div class="col-md-12">
                         <b><label for="email" class="form-label">Email</label></b>
                         <input type="email" name="email" class="form-control" id="email">
                    </div>
                    <div class="col-md-12 rating">
                         <a href="1"><i class="rating__star far fa-star"></i></a>
                         <i class="rating__star far fa-star"></i>
                         <i class="rating__star far fa-star"></i>
                         <i class="rating__star far fa-star"></i>
                         <i class="rating__star far fa-star"></i>
                    </div>
                    <div class="col-md-12">
                         <b><label for="message" class="form-label">Review</label></b>
                         <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                    </div>


                    <div class="col-12">
                         <button type="submit" class="btn reg">Submit Review</button>
                    </div>
               </form>
               <br>
               <h4>View All Reviews</h4>
               <hr>

               @foreach($review as $review)
               <div class="row">
                    <div class="col-md-12">
                         <b>{{$review->username}}</b>
                         <p>{{$review->message}}</p>
                    </div>
               </div>
               @endforeach

          </div>
     </div>
</div>


<div class="container py-5">
     <h3 class="py-3  text text-center">You may also like</h3>
     <div class="row">
          @foreach($pro as $pro)
          <div class="col-md-3">
               <a href="{{route('front_end.products_details',$pro->id) }}" class="proname">
                    <img src="{{url('proimg')}}/{{$pro->image}}" data-aos="zoom-in" height="300" width="300" alt="images">
                    <p class="text-center">{{$pro->name}}</p>
               </a>
          </div>
          @endforeach
     </div>
</div>


<div class="container">
     <h3 class="py-3 text">Recently viewed</h3>
     <a href="{{route('front_end.products_details',$product->id) }}" class="proname">
          <div class="row">
               <div class="col-md-3">
                    <img src="{{url('proimg')}}/{{$product->image}}" height="300" width="300" alt="images">
                    <p>{{$pro->name}}</p>
                    <b class="d-flex justify-content-around"> <i> ₹{{$product->price}}</i>
                         <small>
                              <strike> Rs. 1500.00 </strike>
                         </small>
                    </b>
               </div>
          </div>
     </a>
</div>
<br>

<script>
     const ratingStars = [...document.getElementsByClassName("rating__star")];

     function executeRating(stars) {
          const starClassActive = "rating__star fas fa-star";
          const starClassInactive = "rating__star far fa-star";
          const starsLength = stars.length;
          let i;
          stars.map((star) => {
               star.onmouseover = () => {
                    i = stars.indexOf(star);

                    if (star.className === starClassInactive) {
                         for (i; i >= 0; --i) stars[i].className = starClassActive;
                    } else {
                         for (i; i < starsLength; ++i) stars[i].className = starClassInactive;
                    }
               };
          });
     }
     executeRating(ratingStars);
</script>

<script>
     $(document).ready(function() {

          var quantitiy = 0;
          $('.quantity-right-plus').click(function(e) {

               // Stop acting like a button
               e.preventDefault();
               // Get the field name
               var quantity = parseInt($('#quantity').val());

               // If is not undefined

               $('#quantity').val(quantity + 1);


               // Increment

          });

          $('.quantity-left-minus').click(function(e) {
               // Stop acting like a button
               e.preventDefault();
               // Get the field name
               var quantity = parseInt($('#quantity').val());

               // If is not undefined

               // Increment
               if (quantity > 0) {
                    $('#quantity').val(quantity - 1);
               }
          });

     });
</script>
@endsection