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
                    <h2 class="p-1">Voucher Name: {{$vouchars->vouchar_name}}</h2>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5">
                            <h5 class="p-1">Discounted Price: <i> ₹{{$vouchars->vouchar_price}}</i>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">

                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <button id="buy-now" type="submit" class="btn btn-warning form-control">Buy it Now</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 pt-4">
                    <p>
                        "Transform your living space with our Artisanal Home Décor Voucher. Explore a unique collection
                        of handmade sculptures, paintings, and home accents crafted by local artisans. Whether you're
                        redecorating or looking for a one-of-a-kind gift, this voucher brings elegance and personality
                        to any home." </p>
                </div>
                <div class="col-md-12 pt-3">
                    <b>Details:</b>
                    {{-- <p>{!!$vouchars->vouchar_detail!!}</p> --}}
                    <p>Use this voucher to shop for handmade home décor items, including sculptures, paintings, ceramics, and more.</p>
                    <p>Customize your home with unique, limited-edition items that reflect a blend of traditional and modern styles.</p>
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

        var isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
        var $buyNowButton = $(this);
        // Disable the button to prevent multiple clicks
        $buyNowButton.prop('disabled', true);

        if (!isLoggedIn) {
            window.location.href = "{{ route('front_end.myaccount') }}?message=Please log in to purchase the voucher.";
                        return; 
        }

        var voucharId = $('#vouchar_id').val();

        $.ajax({
            url: '{{ route("check.vouchar.price") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                vouchar_id: voucharId
            },
            
            success: function(response) {
                if (response.price == '0') {
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
                        },
                        complete: function() {
                            // Re-enable the button after the AJAX call is complete
                            $buyNowButton.prop('disabled', false);
                        }
                    });
                } else {
                    var options = {
                        "key": "{{ env('RAZORPAY_KEY') }}",
                        "amount": response.price * 100,  
                        "currency": "INR",
                        "name": "Voucher Purchase",
                        "description": "Buy Voucher",
                        "handler": function (response) {
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
                                    $buyNowButton.prop('disabled', false);
                                },
                                error: function(error) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Payment Failed!',
                                        text: 'Payment failed. Please try again.'
                                    });
                                    // $buyNowButton.prop('disabled', false);

                                },
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