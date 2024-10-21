@extends("Front_end.Layouts.userside")

@section('content')

<div class="container pt-5 mb-4">
    <h3 class=" p-5 text text-center">Vouchers</h3>

    <div class="row text-center">
    @foreach ($vouchars as $vouchar)
    <div class="pimg col-md-3 col-sm-6" style="position: relative">
        <a href="{{route('front_end.vouchar_detail',$vouchar->id) }}" class="voucharname">

        <img src="{{asset('voucharimage/' . $vouchar->vouchar_image)}}" height="250" width="250" data-aos="zoom-in">
        </a>
        <p class="text-center py-2 mb-0">
            {{$vouchar->vouchar_name}}
       </p>
       <p class="text-center py-1">
        ₹{{$vouchar->vouchar_price}}
        </p>
    </div>
    @endforeach
    </div>
</div>
@endsection