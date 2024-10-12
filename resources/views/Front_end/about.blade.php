@extends("Front_end.Layouts.userside")

@section('content')


<div class="container">
     <div class="row py-5 align-items-center">
          <div class="col-lg-6 col-md-12 mb-4 mb-lg-0" data-aos="fade-right" data-aos-duration="4000">
               <img src="{{url('/assets/')}}/{{'img/about.jpg'}}" class="img-fluid">
          </div>
          <div class="col-lg-6 col-md-12 py-lg-5" data-aos="fade-left" data-aos-duration="4000">
               <h3 class="text-center">Our Story</h3>
               <div class="py-3">
                    <p> 
                         Handmade things are always charismatic as its not just a product anymore, its an emotion to be
                         felt. Mudrankan, a name that stands out for its uniqueness and ancient touch, is an unique
                         platform of handcrafted products by Indian Artists. Our curated collection reaches you from the
                         notches and corners of India, hand-made with pure love and hard work by our local artisians.
                         Mudrankan envisions to bring back Indian Karigars, ancient art forms, & craft traditions to
                         breathe and support them for the cultural value that they hold. Now, don’t just buy a product,
                         rather invest in for the handmade art to cherish them forever.
                    </p>
               </div>
          </div>
     </div>
</div>


@endsection