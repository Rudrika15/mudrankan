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
                                   <div class="pimg col-sm-2">
                                        <img src="{{url('proimg')}}/{{$wishlist->product->image}}" style="height: 150px; width: 150px;" class="h1">
                                   </div>
                                   <div class="pdetail col-sm-6">
                                        <a class="proname" href="{{route('front_end.products_details',$wishlist->product_id)}}">
                                             {{$wishlist->product->name}}
                                             <span class="pt-2 d-flex justify-content-start">
                                                  <!-- <small class="px-2"><strike> ₹. 10000.00 </strike></small> -->
                                                  <h5>₹{{$wishlist->product->price}}</h5>
                                             </span>
                                        </a>
                                        <div class="pt-2 mb-2">
                                             <a class="text-danger remove-wishlist"  href="javascript:void(0);" data-id="{{$wishlist->id}}">Remove</a>
                                        </div>
                                        <div class="col-md-12">
                                             <!-- Form for adding to cart -->
                                             <form action="{{ route('front_end.cartcode', $wishlist->product->id) }}" method="POST">
                                                 @csrf
                                                 <div class="row mb-2">
                                                     <div class="col-md-3">
                                                       <label for="quantity">Quantity</label>
                                                         <input type="number" name="quantity" class="form-control" value="1" min="1" placeholder="Quantity">
                                                     </div>
                                                  </div>
                                                  <div class="row">
                                                     <div class="col-md-3">
                                                         <button type="submit" name="action" value="cart" class="btn btn-primary form-control mb-2">Add to Cart</button>
                                                     </div>
                                                     </div>
                                             </form>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
     $(document).ready(function (){

          $('.remove-wishlist').on('click',function(){

               var id = $(this).attr('data-id');
               var url = "{{route('front_end.wishlistdelete',':id')}}";
               url = url.replace(':id',id);

               Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you want to remove this item from your wishlist?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, remove it!',
                    cancelButtonText: 'No, keep it'
               }).then((result) => {
                    if (result.isConfirmed) {
                         $.ajax({
                              type: 'GET',
                              url: url,
                              success: function(response) {
                                   if(response.success) {
                                        // Remove the wishlist item from the DOM without showing a success message
                                        $('#wishlist-item-' + id).remove();
                                        Swal.fire({
                                             title: 'Removed Successfully',
                                             text:"Wishlist Item Removed Successfully",
                                             icon: 'success',
                                             confirmButtonText: 'ok',
                                        }).then(()=>{
                                             window.location.reload();
                                        }
                                   );
                                   }
                              },
                              error: function(xhr) {
                                   // Show an error message if there's an issue with the request
                                   Swal.fire(
                                        'Error!',
                                        'An error occurred. Please try again.',
                                        'error'
                                   );
                              }
                         });
                    }
               });
          });
     });
</script>

@endsection