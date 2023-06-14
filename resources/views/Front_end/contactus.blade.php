@extends("Front_end.Layouts.userside")

@section('content')


<div class="py-5">
     <div class="container p-5 shadow mb-5 bg-white rounded" style="width: 50%;">
          <h1 class="text">Contact Us</h1>
          <i class="bi bi-telephone-inbound"></i>
          <p>+917600891148</p>
          <i class="bi bi-envelope"></i>
          <p> support@mudrankan.com </p>

          <h6>INFORMATION ABOUT US</h6>
          <h4>CONTACT US FOR ANY
               QUESTIONS</h4>
          <form action="{{route('front_end.contactuscode')}}" method="post">
               @csrf
               <label for="first name">First name:</label><br>
               <input type="text" name="name"><br>
               <label for="email">Your Email:</label><br>
               <input type="text" name="email"><br>
               <label for="subject">Subject:</label><br>
               <input type="text" name="subject"><br>
               <label for="message ">Message</label><br>
               <textarea id="w3review" name="message" rows="4" cols="50"></textarea><br>
               <button class="btn reg" type="submit">submit</button>


          </form>
          @if ($message = Session::get('success'))


          <div class="alert alert-light alert-dismissible">
               <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
               <strong>{{$message}}</strong>
          </div>


          @endif
     </div>
</div>
@endsection