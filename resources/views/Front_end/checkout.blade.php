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
                              <a class="navbar-brand" href="#"><img src="{{asset('assets/img/logo.jpg')}}" class="logo"></a>
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
                                   <form action="{{route('front_end.checkoutcode')}}" method="post">
                                        @csrf
                                        <!-- <input type="hiddenn" value="{{request('id')}}"> -->
                                        <div class="col-md-12 py-3">
                                             @foreach($add as $add)

                                             <div class="accordion accordion-flush py-2" id="accordionFlushExample">
                                                  <div class="accordion-item">
                                                       <h5 class="accordion-header text-center form-control" id="flush-headingOne">
                                                            <input type="radio" name="address_id" id="add" value="{{$add->id}}" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne-{{$add->id}}" aria-expanded="false" aria-controls="flush-collapseOne">
                                                            <label for="add">{{$add->apartment}},{{$add->city}},{{$add->pin}}</label>
                                                       </h5>
                                                       <div id="flush-collapseOne-{{$add->id}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
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
                                                                      </thead>
                                                                 </table>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>

                                             @endforeach
                                        </div>
                              </div>


                              <div class="row py-5">
                                   <div class="col-md-8 pe-3">
                                        <a href="{{route('front_end.viewcart')}}" class="text-dark" style="text-decoration: none;">
                                             < Return to cart</a>

                                   </div>
                                   <div class="col-md-4 pe-3">
                                        <button class="btn reg" type="submit">Continue Shopping</button>
                                   </div>
                                   </form>

                              </div>
                              <hr>
                              <div class="row">
                                   <div class="col-sm-3"><small><a href="" class="text-dark" style="text-decoration: none;">Refund
                                                  policy</a></small></div>
                                   <div class="col-sm-3"><small><a href="" class="text-dark" style="text-decoration: none;">Shipping policy</a></small></div>
                                   <div class="col-sm-3"><small><a href="" class="text-dark" style="text-decoration: none;">Privacy policy</a></small></div>
                                   <div class="col-sm-3"><small><a href="" class="text-dark" style="text-decoration: none;">Terms
                                                  of service</a></small></div>
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
               <div class="container-fluid">

                    <table class="table">
                         <thead>
                              <tr>
                                   <th></th>
                                   <th>Name</th>
                                   <th>Price</th>
                                   <th>Qty</th>
                                   <th>Total Price</th>
                              </tr>
                         </thead>
                         <tbody>

                              @php
                              $total = 0;
                              $cntqty =0;
                              @endphp

                              @if(session('cart'))
                              @foreach(session('cart') as $id => $product)
                              @php
                              $total += $product['price'] * $product['quantity'];
                              $cntqty += $product['quantity'];
                              @endphp
                              <tr>
                                   <td><img src="{{url('proimg')}}/{{$product['image']}}" class="rounded" alt="image" height="40px" width="40px"></td>
                                   <td> {{$product['name']}}</td>
                                   <td> {{$product['price']}}</td>
                                   <td> {{$product['quantity']}}</td>
                                   <td> {{ $product['price'] * $product['quantity'] }}</td>
                              </tr>
                              @endforeach
                              @endif
                         </tbody>
                    </table>
                    <div class="card-body text-center">
                         <form action="{{ route('razorpay.payment.store') }}" method="POST">
                              @csrf
                              <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY') }}" data-amount="1000" data-currency="INR" data-buttontext="Make Payment" data-name="Mudrankan" data-description="Rozerpay" data-image="{{asset('assets/img/logo.jpg')}}" data-prefill.name="name" data-prefill.email="email" data-theme.color="#A17C48"></script>
                         </form>
                    </div>

                    <div class="row py-2">
                         <div class="col-md-10">
                              <input type="text" class="form-control" id="discount" placeholder="Discount Code">
                         </div>
                         <div class="col-md-2">
                              <button class="btn" disabled>Apply</button>
                         </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between text-muted">
                         <div class="">
                              <label for="subt">Subtotal</label>
                         </div>
                         <div class="">
                              <label for="pr">₹{{$total}}</label>
                         </div>
                    </div>
                    <div class="d-flex justify-content-between text-muted">
                         <div class="">
                              <label for="subt">Quantity</label>
                         </div>
                         <div class="">
                              <label for="pr">{{$cntqty }}</label>
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
                                   <h3 class="text-dark">₹{{$total}}</h3>
                              </label>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>
<br>





@endsection