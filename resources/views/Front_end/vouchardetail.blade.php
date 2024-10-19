@extends("Front_end.Layouts.userside")

@section('content')
<div class="container pt-5">
    <div class="row ">
         <div class="col-md-6" style="position: relative;">
            <input type="hidden" id="vouchar_id" value="{{$vouchars->id}}">
            <img src="{{asset('voucharimage/' . $vouchars->vouchar_image)}}" class="d-block w-100 sticky" alt="img">
        </div>

            <div class="col-md-6 overflow-auto">
                <a href="{{route('front_end.index')}}" class="text-dark" style="text-decoration: none;"> Home</a> /
                <a href="{{route('front_end.vouchar')}}" class="text-dark" style="text-decoration: none;"> Vouchar</a> /
                <a href="#" class="text-dark" style="text-decoration: none;"> vouchar Detail </a>/
           <div class="row pt-3">
            <div class="col md-12">
                 <h2 class="p-1">{{$vouchars->vouchar_name}}</h2>
            </div>
            <div class="col-md-12">
                 <div class="row">
                      <div class="col-md-5">
                           <h5 class="p-1"><i> ₹{{$vouchars->vouchar_price}}</i>
                           </h5>
                      </div>
                 </div>
            </div>
            <div class="col-md-12">

            </div>
            <div class="col-md-12">
                 <!-- Form for adding to cart -->
                      <div class="row">
                         <div class="col-md-12">    
                            @if (Auth::user())
                            <button  id="buy-now"  type="submit"  class="btn btn-warning form-control">Buy it Now</button>
                            @endif
                         </div>
                         </div>
             </div>
                                  
            <div class="col-md-12 pt-4">
                 <p>This lively décor sculpture will illuminate any room, its elegant shape radiates finesse and
                      beauty. Naturally eye catching this sculpture could transform your living room, bedroom,
                      kitchen, office into a work of art! Home Décor Statues, Figurines, Ornaments for Office,
                      Bedroom, Living room Minimalist Sculptures, Home Décor Figurines, Shabby Chic Home Décor</p>
            </div>
            <div class="col-md-12 pt-3">
                 <b>Details:</b>
                 <p>{!!$vouchars->vouchar_detail!!}</p>
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
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<div id="message"></div>
<script>
$(document).ready(function() {
    $('#buy-now').on('click', function() {
        var voucharId = $('#vouchar_id').val();

        // AJAX to check the price of the voucher
        $.ajax({
            url: '{{ route("check.vouchar.price") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                vouchar_id: voucharId
            },
            
            success: function(response) {
                if (response.price == '0') {
                    // If the price is zero, save voucher directly in the purchased_vouchars table
                    $.ajax({
                        url: '{{ route("save.vouchar") }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            vouchar_id: voucharId
                        },
                        success: function(result) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Voucher Purchased Successfully!',
                                text: result.success
                            });
                        },
                        error: function(error) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Something went wrong while saving the voucher.'
                            });
                        }
                    });
                } else {
                    // If the price is not zero, initiate Razorpay payment
                    var options = {
                        "key": "{{ env('RAZORPAY_KEY') }}",
                        "amount": response.price * 100,  // Amount in paise
                        "currency": "INR",
                        "name": "Voucher Purchase",
                        "description": "Buy Voucher",
                        "handler": function (response) {
                            // On successful payment, save the payment details and voucher
                            $.ajax({
                                url: '{{ route("payment.complete") }}',
                                method: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    razorpay_payment_id: response.razorpay_payment_id,
                                    vouchar_id: voucharId
                                },
                                success: function(result) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Payment Successful!',
                                        text: 'Voucher purchased successfully!'
                                    });                                
                                },
                                error: function(error) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Payment Failed!',
                                        text: 'Payment failed. Please try again.'
                                    });
                                }
                            });
                        },
                        "theme": {
                            "color": "#3399cc"
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                }
            },
            error: function(error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Unable to check the voucher price. Please try again later.'
                });            
            }
        });
    });
});

</script>

@endsection