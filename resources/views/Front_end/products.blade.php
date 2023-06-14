@extends("Front_end.Layouts.userside")

@section('content')



<div class="">
     <div class="row">
          <div class="col-md-12 ">
               <div class="proimg">
                    <h2 class="text-light">
                         <a class="home" href="#"></a>
                    </h2>
               </div>
          </div>
     </div>
</div>


<div class="container pt-5">

     <hr>

     <div class="d-flex justify-content-end">
          <!-- <h4><i class="bi bi-square-fill p-2"></i></h4>
          <h4><i class="bi bi-grid-fill p-2"></i></h4>
          <h4><i class="bi bi-list p-2"></i></h4> -->
     </div>
     <h3 class="p-5 text text-center">Products</h3>
     <div class="row text-center">
          @foreach($product as $product)
          <div class="col-md-3 col-sm-6">

               <a href="{{route('front_end.products_details',$product->id) }}" class="proname">
                    <img src="{{url('proimg')}}/{{$product->image}}" height="250" width="250" data-aos="zoom-in">
                    <p class="d-flex justify-content-center pt-2">
                         {{$product->name}}
                    </p>
                    <p class="d-flex justify-content-center">
                         ₹{{$product->price}}
                    </p>
               </a>

          </div>
          @endforeach
     </div>


     <h3 class="p-5 text">Recently viewed</h3>
     <div class="container">
          <div class="row text-center">
               <div class="col-md-3">
                    <a href="{{route('front_end.products_details',$pro->id) }}" class="proname">
                         <img src="{{url('proimg')}}/{{$pro->image}}" height="300" width="300" alt="images">
                         <p class="">{{$pro->name}}</p>
                         <b class="d-flex justify-content-around"> <i> ₹{{$pro->price}}</i>
                              <small>
                                   <strike> Rs. 1500.00 </strike>
                              </small>
                         </b>
                    </a>
               </div>
          </div>
     </div>
</div>
@endsection