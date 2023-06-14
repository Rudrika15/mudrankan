@extends("Front_end.Layouts.userside")

@section('content')

<div class="container py-5">
     <div class="card shadow mb-4">
          <div class="card-header py-3">
               <h5 class="m-0 font-weight-bold font text">Wishlist</h5>
          </div>
          <div class="card-body">

               @foreach($wishlist as $wishlist)
               <div class="row">
                    <div class="col-md-12">
                         <div class="container">
                              <div class="row">
                                   <div class="col-sm-2">
                                        <img src="{{url('proimg')}}/{{$wishlist->image}}" style="height: 150px; width: 150px;" class="h1">
                                   </div>
                                   <div class="col-md-10 col-sm-6">
                                        <a class="proname" href="{{route('front_end.products_details',$wishlist->product_id)}}">
                                             {{$wishlist->name}}
                                             <span class="pt-2 d-flex justify-content-start">
                                                  <!-- <small class="px-2"><strike> ₹. 10000.00 </strike></small> -->
                                                  <h5>₹{{$wishlist->price}}</h5>
                                             </span>
                                             <div class="">
                                                  <span class="">Product Quantity : <b>{{$wishlist->quantity}}</b></span> <br>
                                             </div>
                                        </a>
                                        <div class="pt-2">
                                             <a class="text-danger" href="{{route('front_end.wishlistdelete',$wishlist->id)}}">Remove</a>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <hr>
                    </div>
               </div>

               @endforeach
               <p style="font-size:15px;"> <a class="btn reg" href="{{route('front_end.index')}}"><i class="bi bi-caret-left-fill"></i> RETURN TO THE SHOP</a></p>

          </div>
     </div>
</div>
@endsection