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

<div class="py-5">
    <div class="container p-5 shadow mb-5 bg-white rounded" style="width: 50%;">
        <div class="text-center h1 text">Add New Adddress</div>

        <form class="row g-3" action="{{route('front_end.addresscode')}}" method="post">
            @csrf

            <!-- <input type="hiddenn" value="{{request('id')}}"> -->
            <div class="col-md-12">
                <input type="email" class="form-control" name="email" placeholder="Email" id="inputEmail4">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        <small>Email me with news and offers</small>
                    </label>
                </div>
            </div>
            <div class="col-md-12">
                <h5><label for="shipaddress" class="form-label">Shipping Address</label></h5>
                <div class="row">
                    <div class="col-md-12">
                        <small><label for="country" class="form-label">Country/Region</label></small>
                        <select name="country" id="" class="form-control">

                            <option value="India">
                                India
                            </option>
                            <option value="United State">
                                United State
                            </option>
                            <option value="Canada">
                                Canada
                            </option>
                            <option value="Russia">
                                Russia
                            </option>
                            <option value="U.K">
                                U.K
                            </option>
                            <option value="New zealand">
                                New zealand
                            </option>

                        </select>
                    </div>
                    <div class="col-md-12 py-2">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="First Name" name="firstname" id="firstname">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Last Name" name="lastname" id="lastname">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 py-2">
                        <input type="text" class="form-control" placeholder="Company (Optional)" name="company" id="company">
                    </div>
                    <div class="col-md-12 py-2">
                        <input type="text" class="form-control" placeholder="Address" name="address" id="address">
                    </div>
                    <div class="col-md-12 py-2">
                        <input type="text" class="form-control" name="apartment" placeholder="Apartment, suite, etc. (optional)" id="landmark">
                    </div>
                    <div class="col-md-12 py-2">
                        <div class="row">
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="city" placeholder="City" id="city">
                            </div>
                            <div class="col-sm-4">
                                <select name="state" id="" class="form-select">
                                    <option>
                                        state
                                    </option>
                                    <option value="India">
                                        India
                                    </option>
                                    <option value="India">
                                        India
                                    </option>
                                    <option value="India">
                                        India
                                    </option>
                                    <option value="India">
                                        India
                                    </option>
                                    <option value="India">
                                        India
                                    </option>
                                    <option value="India">
                                        India
                                    </option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="Pin code" name="pin" id="pin">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
            </div>
            <div class="col-12">
                <input name="check1" type="checkbox" id="check1">
                <label for="check1">Save this information for next time</label>
            </div>
            <div class="col-12">
                <input name="check2" type="checkbox" id="check2">
                <label for="check2">Get order updates on WhatsApp & SMS</label>
            </div>

            <div class="col-md-12 py-3">
                <button class="btn reg" type="submit">Submit</button>
            </div>

        </form>
    </div>
</div>



@endsection