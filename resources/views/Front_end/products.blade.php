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
          <div class="col-md-3 col-sm-6" style="position: relative">

               <a href="{{route('front_end.products_details',$product->id) }}" class="proname">
                    <img src="{{url('proimg')}}/{{$product->image}}" height="250" width="250" data-aos="zoom-in">
                    @if (Auth::check()) 
                    <div class="wishlist-icon" data-aos="zoom-in" style="position: absolute; left: 230px; top: 10px; right: 10px; ">
                      <a href="javascript:void(0);" class="add-to-wishlist" data-product-id="{{ $product->id }}" data-id="{{ $wishlist[0]->id ?? '-' }}"> 
                       
                        <i class="bi bi-heart-fill {{ $wishlist->contains('product_id', $product->id) ? 'active' : '' }}" data-id="{{ $wishlist[0]->id ?? '-' }}" style="z-index: 9999; height: 20px; width: 20px; font-size: 20px;" aria-hidden="true"></i>
                      </a>
                    </div>  
                    @else
                    <div class="wishlist-icon" data-aos="zoom-in" style="position: absolute; left: 230px; top: 10px; right: 10px; ">
                      <a href="{{url('myaccount')}}" class="add-to-wishlist" data-product-id="{{ $product->id }}"> 
                       
                        <i class="bi bi-heart-fill " style="z-index: 9999; height: 20px; width: 20px; font-size: 20px;" aria-hidden="true"></i>
                      </a>
                    </div> 
                @endif
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
               <div class="col-md-3" style="position: relative">
                    <a href="{{route('front_end.products_details',$pro->id) }}" class="proname">
                         <img src="{{url('proimg')}}/{{$pro->image}}" height="300" width="300" alt="images">
                         @if (Auth::check()) 
                         <div class="wishlist-icon" style="position: absolute; left: 275px; top: 10px; right: 10px; ">
                           <a href="javascript:void(0);" class="add-to-wishlist" data-product-id="{{ $pro->id }}" data-id="{{ $wishlist[0]->id ?? '-' }}"> 
                            
                             <i class="bi bi-heart-fill {{ $wishlist->contains('product_id', $pro->id) ? 'active' : '' }}" data-id="{{ $wishlist[0]->id ?? '-' }}" style="z-index: 9999; height: 30px; width: 30px; font-size: 30px;" aria-hidden="true"></i>
                           </a>
                         </div>  
                         @else
                         <div class="wishlist-icon" style="position: absolute; left: 275px; top: 10px; right: 10px; ">
                           <a href="{{url('myaccount')}}" class="add-to-wishlist" data-product-id="{{ $pro->id }}"> 
                            
                             <i class="bi bi-heart-fill " style="z-index: 9999; height: 30px; width: 30px; font-size: 30px;" aria-hidden="true"></i>
                           </a>
                         </div> 
                     @endif     
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