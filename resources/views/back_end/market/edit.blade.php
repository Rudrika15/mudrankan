
@extends('back_end.layout.layout')
@section('title') 
Category Edit
@endsection

@section('body')

<div class="container mt-3">
  <h2>{{__('Market Edit')}}</h2>
  @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <p>{{ $message }}</p>
        </div>
    @endif
      
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <form action="{{url('backend/market/edit_code')}}" method="post">
  @csrf
    <input type="hidden" name="id" value="{{$data->id}}">
    
    <div class="mb-3 mt-3">
      <label for="name">{{__('Name')}}:</label>
      <input type="text" class="form-control" id="name" value="{{$data->name}}" placeholder="{{__('Enter Name')}}" name="name">
    </div>
    <div class="mb-3">
      <label for="desciption">{{__('Description')}}:</label>
      <textarea class="form-control" id="description" placeholder="{{__('Enter description')}}" name="description">{{$data->description}}</textarea>
    </div>
    <div class="mb-3">
      <label for="address">{{__('Address')}}:</label>
      <textarea class="form-control" id="address" placeholder="{{__('Enter address')}}" name="address">{{$data->address}}</textarea>
    </div>
    
    <div class="mb-3 mt-3">
      <label for="longitude">{{__('Longitude')}}:</label>
      <input type="text" class="form-control" id="longitude" value="{{$data->longitude}}" placeholder="{{__('Enter here')}}" name="longitude">
    </div>
    <div class="mb-3 mt-3">
      <label for="latitude">{{__('Latitude')}}:</label>
      <input type="text" class="form-control" id="latitude" value="{{$data->latitude}}" placeholder="{{('Enter here')}}" name="latitude">
    </div>
    <div class="mb-3 mt-3">
      <label for="phone">{{__('Phone')}}:</label>
      <input type="text" class="form-control" id="phone" value="{{$data->phone}}" placeholder="{{__('Enter phone no')}}" name="phone">
    </div>
    <div class="mb-3 mt-3">
      <label for="mobile">{{__('Mobile')}}:</label>
      <input type="text" class="form-control" id="mobile" value="{{$data->mobile}}" placeholder="{{__('Enter mobile no')}}" name="mobile">
    </div>
    <div class="mb-3">
      <label for="information">{{__('Information')}}:</label>
      <textarea class="form-control" id="information" placeholder="{{__('Enter info here')}}" name="information">{{$data->information}}</textarea>
    </div>
    <div class="mb-3 mt-3">
      <label for="admin_commision">{{__('Admin Commision')}}:</label>
      <input type="text" class="form-control" id="admin_commision" value="{{$data->admin_commision}}" placeholder="{{__('Enter admin commision')}}" name="admin_commision">
    </div>
    <div class="mb-3 mt-3">
      <label for="delivery_fee">{{__('Delivery Fee')}}:</label>
      <input type="text" class="form-control" id="delivery_fee" value="{{$data->delivery_fee}}" placeholder="{{__('Enter delivery fee')}}" name="delivery_fee">
    </div>
    <div class="mb-3 mt-3">
      <label for="delivery_range">{{__('Delivery Range')}}:</label>
      <input type="text" class="form-control" id="delivery_range" value="{{$data->delivery_range}}" placeholder="{{__('Enter delivery range')}}" name="delivery_range">
    </div>
    <div class="mb-3 mt-3">
      <label for="default_tax">{{__('Default Tax')}}:</label>
      <input type="text" class="form-control" id="default_tax" value="{{$data->default_tax}}" placeholder="{{__('Enter default tax')}}" name="default_tax">
    </div>
    <div class="mb-3 mt-3">
      <label for="close">{{__('Close')}}:</label><br>
      {{__('Yes')}}
      <input type="radio" id="close" name="close" value="yes" checked>
      {{__('No')}}
      <input type="radio" id="close" name="close" value="no">
    </div>
    <div class="mb-3 mt-3">
      <label for="active">{{__('Active')}}:</label><br>
      {{__('Yes')}}
      <input type="radio" id="active" name="active" value="yes" checked>
      {{__('No')}}
      <input type="radio" id="active" name="active" value="no">
    </div>
    <div class="mb-3 mt-3">
      <label for="available_for_delivery">{{__('Available for Delivery')}}:</label><br>
      {{__('Yes')}}
      <input type="radio" id="available_for_delivery" name="available_for_delivery" value="yes" checked>
      {{__('No')}}
      <input type="radio" id="available_for_delivery" name="available_for_delivery" value="no">
    </div>
<button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
  </form>
</div>

<script>
        CKEDITOR.replace('description');
        CKEDITOR.replace('address');
        CKEDITOR.replace('information');
</script>
@endsection
