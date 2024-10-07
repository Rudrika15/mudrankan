@extends("Front_end.Layouts.userside")

@section('content')


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

<div class="container-fluid checkout">
     <div class="row">
          <div class="col-md-6">
               <div class="container-fluid ">
                    <div class="row py-5">
                         <div class="col-md-1">
                              <a class="navbar-brand" href="#"><img src="{{asset('assets/img/logo.jpg')}}"
                                        class="logo"></a>
                         </div>
                         <div class="col-md-12 py-3">
                              <a class="info" href="{{route('front_end.viewcart')}}">Cart</a> >
                              <a class="info" href="#">Information</a> >
                              <a class="info" href="#">Shipping</a> >
                              <a class="info" href="#">Payment</a>
                         </div>

                         <div class="row py-2">
                              <div class="col-sm-7">
                                   <h3 class="text-secondary">Address information</h3>
                              </div>
                              <div class="col-sm-5">
                                   <a class="btn reg" href="{{route('front_end.address')}}">Add New Address</a>
                              </div>
                         </div>
                         <label for="">select any one <i class="bi bi-arrow-down"></i></label>
                         <div class="col-md-12">
                              <div class="row">
                                   <form action="{{route('razorpay.payment.store')}}" method="post" id="payment-form">
                                        @csrf
                                        {{--
                                        <!-- <input type="hiddenn" value="{{request('id')}}"> --> --}}
                                        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">

                                        <div class="col-md-12 py-3">
                                             @foreach($add as $index => $add)

                                             <div class="accordion accordion-flush py-2" id="accordionFlushExample">
                                                  <div class="accordion-item">
                                                       <h5 class="accordion-header text-center form-control"
                                                            id="flush-headingOne">
                                                            <input type="radio" name="address" id="add-{{$add->id}}"
                                                                 value="{{$add->id}}" class="accordion-button collapsed"
                                                                 data-bs-toggle="collapse"
                                                                 data-bs-target="#flush-collapseOne-{{$add->id}}"
                                                                 aria-expanded="false" aria-controls="flush-collapseOne"
                                                                 {{ $index===0 ? 'checked' : '' }}>
                                                            <label for="add-{{$add->id}}">{{$add->apartment ??
                                                                 ''}}{{$add->city}},{{$add->pin}}</label>
                                                            {{-- <label for="add">{{$add->apartment ??
                                                                 ''}}{{$add->city}},{{$add->pin}}</label> --}}
                                                       </h5>
                                                       <div id="flush-collapseOne-{{$add->id}}"
                                                            class="accordion-collapse collapse"
                                                            aria-labelledby="flush-headingOne"
                                                            data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body">
                                                                 <table class="table table-bordered">
                                                                      <thead>
                                                                           <tr>
                                                                                <th>Email</th>
                                                                                <td>: {{$add->email}}</td>
                                                                           </tr>
                                                                           <tr>
                                                                                <th>First Name</th>
                                                                                <td>: {{$add->firstname}}</td>
                                                                           </tr>
                                                                           <tr>
                                                                                <th>Last Name</th>
                                                                                <td>: {{$add->lastname}}</td>
                                                                           </tr>
                                                                           <tr>
                                                                                <th>Country</th>
                                                                                <td>: {{$add->country}}</td>
                                                                           </tr>
                                                                           <tr>
                                                                                <th>Company</th>
                                                                                <td>: {{$add->company}}</td>
                                                                           </tr>
                                                                           <tr>
                                                                                <th>Address</th>
                                                                                <td>: {{$add->address}}</td>
                                                                           </tr>
                                                                           <tr>
                                                                                <th>Apartment</th>
                                                                                <td>: {{$add->apartment}}</td>
                                                                           </tr>
                                                                           <tr>
                                                                                <th>City</th>
                                                                                <td>: {{$add->city}}</td>
                                                                           </tr>
                                                                           <tr>
                                                                                <th>State</th>
                                                                                <td>: {{$add->state}}</td>
                                                                           </tr>
                                                                           <tr>
                                                                                <th>Pin Code</th>
                                                                                <td>: {{$add->pin}}</td>
                                                                           </tr>
                                                                           <tr>
                                                                                <th>Phone</th>
                                                                                <td>: {{$add->phone}}</td>
                                                                           </tr>
                                                                           <tr>
                                                                                <td colspan="2">
                                                                                     <a href="{{ route('front_end.addressedit', ['id' => $add->id]) }}" class="btn btn-primary ">
                                                                                         <i class="fa fa-edit"></i> Edit
                                                                                     </a>
                                                                                 </td>
                                                                           </tr>                                                                              
                                                                      </thead>
                                                                 </table>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>

                                             @endforeach
                                        </div>
                              </div>


                              <div class="row py-2">
                                   <div class="card-body text-center">
                                        @if ($carts->count() > 0)
                                        <button class="btn reg" id="rzp-button1">Make Payment</button>
                                        @endif
                                   </div>

                                   <div class="col-md-8 pe-3">
                                        <a href="{{route('front_end.viewcart')}}" class="text-dark"
                                             style="text-decoration: none;">
                                             < Return to cart</a>

                                   </div>
                                   </form>

                              </div>
                              <hr>
                              <div class="row">
                                   <div class="col-sm-3"><small><a href="{{route('refund.policy')}}" class="text-dark"
                                                  style="text-decoration: none;">Refund policy</a></small></div>
                                   <div class="col-sm-3"><small><a href="{{route('shipping.policy')}}" class="text-dark"
                                                  style="text-decoration: none;">Shipping policy</a></small></div>
                                   <div class="col-sm-3"><small><a href="{{route('privacy.policy')}}" class="text-dark"
                                                  style="text-decoration: none;">Privacy policy</a></small></div>
                                   <div class="col-sm-3"><small><a href="{{route('terms.of.service')}}"
                                                  class="text-dark" style="text-decoration: none;">Terms of
                                                  service</a></small></div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <div class="col">
               <div class="d-flex" style="height: 800px;">
                    <div class="vr"></div>
               </div>
          </div>
          <div class="col-md-5 ">
               <div class="container-fluid py-5">

                    <table class="table">
                         <tr>
                              <th></th>
                              <th>Name</th>
                              <th>Price</th>
                              <th>Qty</th>
                              <th>Total Price</th>
                         </tr>

                         {{-- @php
                         $total = 0;
                         $cntqty =0;
                         @endphp

                         @if(session('cart'))
                         @foreach(session('cart') as $id => $product)
                         @php
                         $total += $product['price'] * $product['quantity'];
                         $cntqty += $product['quantity'];
                         @endphp --}}
                         @foreach ($carts as $cart)

                         <tr>
                              <td><img src="{{url('proimg')}}/{{$cart->product->image}}" class="rounded" alt="image"
                                        height="40px" width="40px"></td>
                              <td> {{$cart->product->name}}</td>
                              <td> {{$cart->product->price}}</td>
                              <td> {{$cart->quantity}}</td>
                              <td> {{ $cart->product->price * $cart->quantity }}</td>
                              <input type="hidden" name="product_ids[]" value="{{ $cart->product->id }}">
                         </tr>
                         @endforeach
                         {{-- @endif --}}
                    </table>
                    {{-- <div class="card-body text-center">
                         <form action="{{ route('razorpay.payment.store') }}" method="POST" id="payment-form">
                              @csrf
                              <script src="https://checkout.razorpay.com/v1/checkout.js"
                                   data-key="{{ env('RAZORPAY_KEY') }}" data-amount="{{$total * 100}}"
                                   data-currency="INR" data-buttontext="Make Payment" data-name="Mudrankan"
                                   data-description="Rozerpay" data-image="{{asset('assets/img/logo.jpg')}}"
                                   data-prefill.name="{{Auth::user()->firstName}}"
                                   data-prefill.email="{{Auth::user()->email}}" data-theme.color="#A17C48"></script>
                         </form>
                    </div> --}}
                    @if($carts->count() >0)
                    <div class="row py-2">
                         <div class="col-md-10">
                              <input type="text" class="form-control" id="discount" placeholder="Discount Code">
                         </div>
                         <div class="col-md-2">
                              <button class="btn" id="apply-discount">Apply</button>
                         </div>
                    </div>
                    @endif
                    <hr>
                    <div class="d-flex justify-content-between text-muted">
                         <div class="">
                              <label for="subt">Subtotal</label>
                         </div>
                         <div class="">

                              <label for="pr">₹{{ $total }}</label>
                         </div>
                    </div>
                    <div class="d-flex justify-content-between text-muted">
                         <div class="">
                              <label for="subt">Quantity</label>
                         </div>
                         <div class="">
                              <label for="pr">{{$totalquantity }}</label>
                         </div>
                    </div>
                    <div class="d-flex justify-content-between text-muted">
                         <div class="">
                              <label for="subt">Shipping</label>
                         </div>
                         <div class="">
                              <label for="pr">free</label>
                         </div>
                    </div>
                    <hr>

                    <div class="d-flex justify-content-between text-muted">
                         <div class="">
                              <label for="subt">Total</label><br>
                              <!-- <small>Including ₹1,006.63 in taxes</small> -->
                         </div>
                         <div class="">
                              INR
                              <label for="pr">
                                   <label for="pr"><span id="total-price">₹{{ $total }}</span></label>
                                   <input type="hidden" id="final-price" name="final_price" value="{{ $total }}">
                                   {{-- <h3 class="text-dark">₹{{$total}}</h3> --}}
                              </label>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
<br>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

$(document).ready(function() {
     $('#apply-discount').click(function(e) {
          e.preventDefault(); 
 
          var discountCode = $('#discount').val(); 
          var totalPrice = $('#final-price').val(); 
          var product_id = $('input[name="product_ids[]"]').map(function() {
               return $(this).val();
          }).get(); 
           
          // console.log(discountCode);
          // console.log(totalPrice);

          $.ajax({
               url: '{{ route("apply.discount") }}', 
               type: 'POST',
               data: {
                    discount_code: discountCode,
                    total_price: totalPrice,
                    product_ids:product_id,
                    _token: '{{ csrf_token() }}' 
               },
               success: function(response) {
                    if (response.success) {
                        $('#total-price').text('₹' + response.new_price); 
                        $('#final-price').val(response.new_price); 

                        $('#total-price').append('');
                        $('#apply-discount').prop('disabled', true);
                        $('#discount').prop('readonly', true); 
                        Swal.fire({
                         text: "Discount applied successfully!",
                         icon: "success"
                        });
                         //     alert('Discount applied! New Price: ₹' + response.new_price);
                    } else {
                         Swal.fire({
                              title: "Oops...",
                              text: response.message,
                              icon: "error"
                         });
                    }
               },
               error: function() {
                    swal("Error", "An error occurred. Please try again.", "error");                 
               }
          });
     });
});
</script>

<script>
document.getElementById('rzp-button1').onclick = function(e) {
     e.preventDefault();
     var updatedAmount = $("#final-price").val() * 100;
     var options = {
          "key": "{{ env('RAZORPAY_KEY') }}",
          "amount": updatedAmount, 
          "currency": "INR",
          "name": "Mudrankan",
          "description": "Razorpay Payment",
          "image": "{{ asset('assets/img/logo.jpg') }}",
          "prefill": {
               "name": "{{ Auth::user()->firstName }}", 
               "email": "{{ Auth::user()->email }}"
          },
          "theme": {
               "color": "#A17C48"
          },
          "handler": function (response) {
               document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
               document.getElementById('payment-form').submit();
          },
          "modal": {
               "ondismiss": function(){}
          }
     };

     var rzp1 = new Razorpay(options);
     rzp1.open();

};
//      console.log("Razorpay Key: " + "{{ env('RAZORPAY_KEY') }}");
//      console.log("Amount: " + $("#final-price").val() * 100);
//      console.log("Currency: " + "INR");
//      console.log("Name: " + "Mudrankan");
//      console.log("Description: " + "Razorpay Payment");
//      console.log("Image: " + "{{ asset('assets/img/logo.jpg') }}");
//      console.log("Name: " + "{{ Auth::user()->firstName }}");
//      console.log("Email: " + "{{ Auth::user()->email }}");

//      var options = {
//         "key": "{{ env('RAZORPAY_KEY') }}", 
//         "amount": $("#final-price").val() * 100, 
//         "currency": "INR",
//         "name": "Mudrankan",
//         "description": "Razorpay Payment",
//         "image": "{{ asset('assets/img/logo.jpg') }}",
//         "prefill": {
//             "name": "{{ Auth::user()->firstName }}", 
//             "email": "{{ Auth::user()->email }}"
//         },

//         "theme": {
//             "color": "#A17C48"
//         },
//         "handler": function (response) {
//             document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;

//             document.getElementById('payment-form').submit();
//         },
//         "modal": {
//             "ondismiss": function(){
//             }
//         },
//     };
    
//     var rzp1 = new Razorpay(options);
    
//     document.getElementById('rzp-button1').onclick = function(e) {
//         rzp1.open();
//         e.preventDefault(); 
//     }
</script>


<script>
$(document).ready(function (){
     $('#payment-form').submit(function (data){
          data.preventDefault();

          var formdata = new FormData(this);

          $.ajax({
               url: $(this).attr('action'),
               method: 'POST',
               data: formdata,
               contentType: false,
               processData: false,
               success: function (response){
                    if(response.status){
                         alert(response.message); 
                         setTimeout(function() {
                              window.location.reload(); 
                         }, 2000);  
                    }
               },
               error: function (xhr, status, error) {
                    // Handle any errors from the server
                    alert('An error occurred: ' + error);
               }
          });
     });

});

</script>

@endsection