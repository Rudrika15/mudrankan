@extends("Front_end.Layouts.userside")

@section('content')






<div class="container pt-5">

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
     <div class="card shadow mb-4">
          <div class="card-header py-3">
               <h5 class="m-0 font-weight-bold font text">Your Cart</h5>
          </div>

          <div class="card-body">
               <div class="row">
                    <div class="col-12-12">
                         @php $total = 0 @endphp
                         @if(session('cart'))
                         @foreach(session('cart') as $id => $product)
                         @php $total += $product['price'] * $product['quantity'] @endphp
                         <div class="row" data-id="{{ $id }}">
                              <div class="col-sm-2">
                                   <img src="{{url('proimg')}}/{{$product['image']}}" style="height: 150px; width: 150px;" class="h1">
                              </div>
                              <div class="col-sm-6">
                                   <b>{{ $product['name'] }}</b> <br>

                                   <span class="pt-2 d-flex justify-content-start">
                                        <!-- <small class="px-2"><strike> ₹. 10000.00 </strike></small> -->
                                        <h5>₹{{ $product['price'] }}</h5>
                                   </span>
                                   <div class="">
                                        <span class="">Product Quantity : <b>{{$product['quantity'] }}</b></span> <br>
                                   </div>
                                   <div class="">
                                        <span class="">Price of {{$product['quantity'] }} Product : <b>{{ $product['price'] * $product['quantity'] }}</b></span> <br>
                                   </div>
                                   <div class="pt-2">
                                        <a class="text-danger cart_remove" style="cursor: pointer;">Remove</a>
                                   </div>
                              </div>
                              <div class="col-md-4">

                              </div>
                         </div>
                         <hr>
                         @endforeach
                         @endif
                    </div>
                    @if($total == 0)
                    <p class="text-center">Your Cart Is Empty <i class="bi bi-wind text-primary"></i></p>
                    <div class="d-flex justify-content-center ">
                         <a href="{{route('front_end.products')}}" class="btn reg" style="width: 200px;">Go to The Shop Now</a>
                    </div>
                    @else

                    <div class="d-flex justify-content-between shadow p-3 mb-0 bg-body rounded footersticky">
                         <b class="h3">Total ₹{{ $total }}</b>
                         <a href="{{route('front_end.checkout')}}" class="btn reg" style="width: 180px;">Order Now</a>
                    </div>
                    @endif

               </div>
          </div>
     </div>




     <div class="container py-5">
          <h3 class="py-2 text text-center">You may also like</h3>
          <div class="row">
               @foreach($random as $random)
               <div class="col-md-3 col-sm-12">
                    <a href="{{route('front_end.products_details',$random->id) }}" class="proname">
                         <img src="{{url('proimg')}}/{{$random->image}}" data-aos="zoom-in" height="250" width="250" alt="images">
                         <p class="">{{$random->name}}</p>
                    </a>
               </div>
               @endforeach
          </div>
     </div>


</div>

<script>
     $(".cart_remove").click(function(e) {
          e.preventDefault();

          var ele = $(this);

          if (confirm("Do you really want to remove?")) {
               $.ajax({
                    url: "{{ route('front_end.remove_from_cart') }}",
                    method: "DELETE",
                    data: {
                         _token: '{{ csrf_token() }}',
                         id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                         window.location.reload();
                    }
               });
          }
     });
</script>


@endsection