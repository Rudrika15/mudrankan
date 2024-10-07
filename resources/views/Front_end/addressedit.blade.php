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
        <div class="text-center h1 text">Edit Address</div>

        <form class="row g-3" action="{{ route('front_end.addressupdate', $address->id) }}" method="post">
            @csrf
            <div class="col-md-12">
                <input type="email" class="form-control" name="email" placeholder="Email" id="inputEmail4" value="{{ old('email', $address->email) }}">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" {{ $address->subscribe ? 'checked' : '' }}>
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
                        <select name="country" id="country" class="form-control">
                            <option value="">Select Country</option>                                 
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}" {{ old('country', $address->country) == $country->countryName ? 'selected' : '' }}>
                                {{ $country->countryName }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12 py-2">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="First Name" name="firstname" id="firstname" value="{{ old('firstname', $address->firstname) }}">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Last Name" name="lastname" id="lastname" value="{{ old('lastname', $address->lastname) }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 py-2">
                        <input type="text" class="form-control" placeholder="Company (Optional)" name="company" id="company" value="{{ old('company', $address->company) }}">
                    </div>
                    <div class="col-md-12 py-2">
                        <input type="text" class="form-control" placeholder="Address" name="address" id="address" value="{{ old('address', $address->address) }}">
                    </div>
                    <div class="col-md-12 py-2">
                        <input type="text" class="form-control" name="apartment" placeholder="Apartment, suite, etc. (optional)" id="landmark" value="{{ old('apartment', $address->apartment) }}">
                    </div>
                    <div class="col-md-12 py-2">
                        <div class="row">
                            <div class="col-sm-4">
                                <select name="state" id="state" class="form-select">
                                    <option value="">Select State</option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}" {{ old('state', $address->state) == $state->stateName ? 'selected' : '' }}>
                                            {{ $state->stateName }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select name="city" id="city" class="form-select">
                                    <option value="">Select City</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}" {{ old('city', $address->city) == $city->cityName ? 'selected' : '' }}>
                                            {{ $city->cityName }}
                                        </option>
                                    @endforeach
                                </select>                            
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="Pin code" name="pin" id="pin" value="{{ old('pin', $address->pin) }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{ old('phone', $address->phone) }}">
            </div>
            <div class="col-12">
                <input name="check1" type="checkbox" id="check1" {{ $address->save_info ? 'checked' : '' }}>
                <label for="check1">Save this information for next time</label>
            </div>
            <div class="col-12">
                <input name="check2" type="checkbox" id="check2" {{ $address->order_updates ? 'checked' : '' }}>
                <label for="check2">Get order updates on WhatsApp & SMS</label>
            </div>

            <div class="col-md-12 py-3">
                <button class="btn reg" type="submit">Update</button>
            </div>

        </form>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#country').change(function() {
            var countryId = $(this).val();
            if(countryId){
                $.ajax({
                    url: '/get-states/' + countryId, 
                    type: 'GET',
                    dataType: 'json',
                    success: function(states) {
                        $('#state').empty(); 
                        $('#state').append('<option value="">Select State</option>'); 
                        $.each(states, function(index, state) {
                            $('#state').append('<option value="' + state.id + '">' + state.stateName + '</option>'); 
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            } else {
                $('#state').empty(); 
                $('#state').append('<option value="">Select State</option>'); 
                $('#city').empty(); 
                $('#city').append('<option value="">Select City</option>'); 
            }
        });

        $('#state').change(function() {
            var stateId = $(this).val();
            if(stateId){
                $.ajax({
                    url: '/get-cities/' + stateId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(cities) {
                        $('#city').empty();
                        $('#city').append('<option value="">Select City</option>');
                        $.each(cities, function(index, city) {
                            $('#city').append('<option value="' + city.id + '">' + city.cityName + '</option>'); 
                        });
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            } else {
                $('#city').empty(); 
                $('#city').append('<option value="">Select City</option>'); 
            }
        });
    });
</script>

@endsection
