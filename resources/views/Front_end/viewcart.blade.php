@extends("Front_end.Layouts.userside")

@section('content')
<style>
     .bi-heart-fill {
         color: grey; 
         transition: color 0.3s ease;
     }
   
     .bi-heart-fill.active {
         color: red; 
     }
   </style>


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
                    <div class="col-md-12">
                         {{-- @php $total = 0 @endphp --}}
                         {{-- @if(session('cart'))
                         @foreach(session('cart') as $id => $product)
                         @php $total += $product['price'] * $product['quantity'] @endphp --}}
                         @foreach ($carts as $cart)
                              
                         <div class="row" data-id="{{ $cart->product->id }}">
                              <div class="col-sm-2">
                                   <img src="{{url('proimg')}}/{{$cart->product->image}}" style="height: 150px; width: 150px;" class="h1">
                              </div>
                              <div class="pdetail col-sm-6">
                                   <b>{{ $cart->product->name }}</b> <br>

                                   <span class="pt-2 d-flex justify-content-start">
                                        <!-- <small class="px-2"><strike> ₹. 10000.00 </strike></small> -->
                                        <h5>₹{{ $cart->product->price }}</h5>
                                   </span>
                                   <div class="">
                                        <span class="">Product Quantity : <b>{{$cart->quantity }}</b></span> <br>
                                   </div>
                                   <div class="">
                                        <span class="">Price of {{$cart->quantity }} Product : <b>{{ $cart->product->price * $cart->quantity }}</b></span> <br>
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
                         {{-- @endif --}}
                    </div>
                    @if($carts->count() == 0)
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




     <div class="container text-center py-5">
          <h3 class="py-2 text text-center">You may also like</h3>
          <div class="row">
               @foreach($random as $random)
               <div class="pimg col-md-3 col-sm-12" style="position: relative">
                    <a href="{{route('front_end.products_details',$random->id) }}" class="proname">
                         <img src="{{url('proimg')}}/{{$random->image}}" data-aos="zoom-in" height="250" width="250" alt="images">
                         @if (Auth::check()) 
                         <div class="wishlist-icon" data-aos="zoom-in" style="position: absolute; left: 230px; top: 10px; right: 10px; ">
                           <a href="javascript:void(0);" class="add-to-wishlist" data-product-id="{{ $random->id }}" data-id="{{ $wishlist[0]->id ?? '-' }}"> 
                            
                             <i class="bi bi-heart-fill {{ $wishlist->contains('product_id', $random->id) ? 'active' : '' }}" data-id="{{ $wishlist[0]->id ?? '-' }}" style="z-index: 9999; height: 20px; width: 20px; font-size: 20px;" aria-hidden="true"></i>
                           </a>
                         </div>  
                         @else
                         <div class="wishlist-icon" data-aos="zoom-in" style="position: absolute; left: 230px; top: 10px; right: 10px; ">
                           <a href="{{url('myaccount')}}" class="add-to-wishlist" data-product-id="{{ $random->id }}"> 
                            
                             <i class="bi bi-heart-fill " style="z-index: 9999; height: 20px; width: 20px; font-size: 20px;" aria-hidden="true"></i>
                           </a>
                         </div> 
                     @endif
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

     Swal.fire({
          title: 'Are you sure?',
          text: "Do you really want to remove this item from the cart?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, remove it!'
     }).then((result) => {
          if (result.isConfirmed) {
               $.ajax({
               url: "{{ route('front_end.remove_from_cart') }}",
               method: "DELETE",
               data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.closest(".row").attr("data-id")
               },
               success: function(response) {
                    Swal.fire(
                         'Removed!',
                         'The item has been removed from your cart.',
                         'success'
                    ).then(() => {
                         window.location.reload();
                    });
               },
               error: function(xhr) {
                    Swal.fire(
                         'Error!',
                         'There was a problem removing the item from your cart.',
                         'error'
                    );
               }
               });
          }
     });
});
</script>
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
            alert(response.error); 
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
            alert(response.error);
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