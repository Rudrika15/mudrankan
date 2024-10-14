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
   
<div class="container-fluid">
     <div class="row breadcrumb m-0">
          <div class="col-lg-12 mt-3">
               <h4 class="text-center">Shop</h4>
          </div>
     </div>
</div>
<div class="container">
     <div class="row py-5">
          <!--filter end-->
          <div class="col-lg-4">
               <hr />
               <h6>FILTER BY CATEGORY</h6>
               <ul class="list">
                    @foreach($category as $category)
                    <li><a href="{{route('front_end.category',$category->id)}}" style="text-decoration:none">{{$category->name}}</a> <span>
                              {{$category->count}}
                         </span></li>
                    @endforeach
               </ul>
               <hr />
               <h6>Top Rated</h6>
               <ul class="list">
                    <li><img src="{{url('/assets/')}}/{{'img/productsmall1.jpg'}}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;"> <span>Acrylic on canvas 4 (30″x40″)</span></li>
                    <li><img src="{{url('/assets/')}}/{{'img/productsmall2.jpg'}}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;"> <span>Acrylic on canvas 4 (30″x40″)</span></li>
                    <li><img src="{{url('/assets/')}}/{{'img/productsmall3.jpg'}}" style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;"> <span>Acrylic on canvas 4 (30″x40″)</span></li>

               </ul>
          </div>



          <div class="col-lg-8 products">
               <div class="row ">
                    @foreach($product as $product)

                    <div class="pimg col-md-3 col-sm-6" style="position: relative">
                         <a href="{{ route('front_end.products_details', $product->id) }}">
                              <img src="{{ url('proimg') }}/{{ $product->image }}" data-aos="zoom-in" height="250" width="250" class="img-thumbnail rounded">
                              @if (Auth::check()) 
                              <div class="wicon wishlist-icon" data-aos="zoom-in" style="position: absolute;  top: 10px; right: 20px; ">
                                <a href="javascript:void(0);" class="add-to-wishlist" data-product-id="{{ $product->id }}" data-id="{{ $wishlist[0]->id ?? '-' }}"> 
                                 
                                  <i class="bi bi-heart-fill {{ $wishlist->contains('product_id', $product->id) ? 'active' : '' }}" data-id="{{ $wishlist[0]->id ?? '-' }}" style="z-index: 9999; height: 20px; width: 20px; font-size: 20px;" aria-hidden="true"></i>
                                </a>
                              </div>  
                              @else
                              <div class="wicon wishlist-icon" data-aos="zoom-in" style="position: absolute;  top: 10px; right: 20px; ">
                                <a href="{{url('myaccount')}}" class="add-to-wishlist" data-product-id="{{ $product->id }}"> 
                                 
                                  <i class="bi bi-heart-fill " style="z-index: 9999; height: 20px; width: 20px; font-size: 20px;" aria-hidden="true"></i>
                                </a>
                              </div> 
                          @endif
                    
                         </a>
                         <p>
                              {{$product->name}}<br>
                              Acrylic Canvas Paintings<br>
                              ₹{{$product->price}}
                         </p>

                    </div>
                    @endforeach

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

          }
          //  else {
          //   alert(response.error); 
          // }
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
          } 
          // else {
          //   alert(response.error);
          // }
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