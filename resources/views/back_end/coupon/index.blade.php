@extends('back_end.layout.layout')
@section('title')
Coupon show
@endsection
@section('body')

<div class="container mt-3 px-5">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="card-title">coupon View</h4>
        <a href="{{ route('coupon.create') }}" class="btn btn-bg-orange btn-sm mt-3 btn-tooltip"><i
            class="bi bi-plus-circle"></i>
          <span class="btn-text">Add New Coupon</span></a>
      </div>

      @if ($message = Session::get('success'))

      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <div class="table-responsive">
        <table id="myDataTable" class="table table-striped">
          <thead>
            <tr>
              <th scope="col" width="50%">{{__('Coupon Code')}}</th>
              <th scope="col" width="50%">{{__('Discount Type')}}</th>
              <th scope="col" width="50%">{{__('Discount')}}</th>
              <th scope="col" width="50%">{{__('Description')}}</th>
              <th scope="col" width="50%">{{__('Product')}}</th>
              <th scope="col" width="50%">{{__('Markets')}}</th>
              <th scope="col" width="50%">{{__('Categories')}}</th>
              <th scope="col" width="50%">{{__('Expires At')}}</th>
              <th scope="col" width="50%">{{__('Options')}}</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $data)
            <tr>
              <td>{{$data->code}}</td>
              <td>{{$data->discount_type}}</td>
              <td>{{$data->discount}}</td>
              <td>{!! $data->discription !!}</td>
              <td>
                {{$data->products->name ?? '-'}}
              </td>
              <td>
                {{$data->markets->name ?? '-'}}
              </td>
              <td>
                {{$data->categories->name ?? '-'}}
              </td>
              <td>{{$data->expires_at}}</td>

              <td>
                <a href="{{url('backend/coupon/edit',$data->id)}}" class="btn btn-bg-blue btn-sm btn-tooltip"><i
                    class="bi bi-pen" aria-hidden="true"></i></a>
                    <button class="btn btn-bg-danger btn-sm btn-tooltip" onclick="deleteField({{ $data->id }})"><i class="bi bi-trash" aria-hidden="true"></i></button>               
                    {{-- <a href="{{ route('coupon.delete',$data->id)}}" class="btn btn-bg-danger btn-sm btn-tooltip"><i
                    class="bi bi-trash" aria-hidden="true"></i></a> --}}
                @endforeach
              </td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script>
  function deleteField(id) {
   Swal.fire({
    title: 'Are you sure?',
    text: "Do you really want to remove this item from the Coupon?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, remove it!'
   }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = '/backend/coupon/delete/' + id;
    }
   })
  }
</script>

@endsection