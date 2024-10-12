@extends("Front_end.Layouts.userside")

@section('content')


<div class="py-5">
     <div class="container p-5 shadow mb-5 bg-white rounded" style="max-width: 600px;">
          <h1 class="text-center">Contact Us</h1>
          <div class="mb-2">
               <i class="bi bi-telephone-inbound"></i>
               <p class="d-inline-block">+917600891148</p>     
          </div>
          <div class="mb-2">
               <i class="bi bi-envelope"></i>
               <p class="d-inline-block">support@mudrankan.com </p>     
          </div>

          <h6>INFORMATION ABOUT US</h6>
          <h5>CONTACT US FOR ANY
               QUESTIONS</h5>
          <form action="{{route('front_end.contactuscode')}}" method="post">
               @csrf
               <div class="mb-3">
                    <label for="first name" class="form-label">First name:</label>
                    <input type="text" name="name" class="form-control" required>     
               </div>
               <div class="mb-3">
                    <label for="email" class="form-label">Your Email:</label>
                    <input type="text" name="email" class="form-control" required>     
               </div>
               <div class="mb-3">
                    <label for="subject" class="form-label">Subject:</label>
                    <input type="text" name="subject" class="form-control" required>     
               </div>
               <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea id="message" name="message" rows="4" class="form-control" required></textarea><br>     
               </div>
               <button class="btn reg w-100" type="submit">submit</button>


          </form>
          @if ($message = Session::get('success'))
          <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
               <strong>{{$message}}</strong>
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif
     </div>
</div>
@endsection