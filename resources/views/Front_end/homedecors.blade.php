@extends("Front_end.Layouts.userside")

@section('content')


<div class="container-fluid">
     <div class="row breadcrumb">
          <div class="col-lg-12">
               <h4 class="text-center">Shop</h4>
          </div>
     </div>
</div>
<div class="container">
     <div class="row py-5">
          <!--filter start-->
          <div data-role="main" class="ui-content">
               <form action="" method="post">
                    <div data-role="rangeslider">
                         <label for="price-min">Price:</label>
                         <input type="range" name="price-min" id="price-min" value="200" min="0" max="1000">
                    </div>
               </form>
          </div>

          <!--filter end-->
          <div class="col-lg-3">
               <hr />
               <h6>FILTER BY CATEGORY</h6>
               <ul class="list">
                    @foreach($category as $category)
                    <li><a href="{{route('front_end.products',$category->id)}}" style="text-decoration:none">{{$category->name}}</a> <span>
                              {{$category->count}}
                         </span></li>
                    @endforeach
               </ul>
               <hr />
               <h6>Top Rated</h6>
               <ul class="list">
                    <li><img src="{{url('/assets/')}}/{{'img/productsmall1.jpg'}}"> <span>Acrylic on canvas 4 (30″x40″)</span></li>
                    <li><img src="{{url('/assets/')}}/{{'img/productsmall2.jpg'}}"> <span>Acrylic on canvas 4 (30″x40″)</span></li>
                    <li><img src="{{url('/assets/')}}/{{'img/productsmall3.jpg'}}"> <span>Acrylic on canvas 4 (30″x40″)</span></li>

               </ul>
          </div>



          <div class="col-lg-9 products">
               <div class="row ">
                    @foreach($product as $product)

                    <div class="col-lg-4"><img src="{{url('/assets/')}}/{{'img/product1.jpg'}}" class="img-thumbnail rounded">
                         <p>
                              {{$product->name}}<br>
                              Acrylic Canvas Paintings<br>
                              <a href="{{route('front_end.products_details',$product->id) }}">₹{{$product->price}}</a>
                         </p>

                    </div>
                    @endforeach

               </div>




          </div>
     </div>
</div>
@endsection