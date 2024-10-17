
@extends('back_end.layout.layout')
@section('title') 
Vouchar show 
@endsection
@section('body')

<div class="container mt-3 px-5">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="card-title">Vouchar View</h4>
        <a href="{{ route('voucharmaster.create') }}" class="btn btn-bg-orange btn-sm mt-3 btn-tooltip"><i
          class="bi bi-plus-circle"></i>
      <span class="btn-text">Add New Vouchar</span></a>
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
        <th>Vouchar Name</th>
        <th>Vouchar Price</th>
        <th>Vouchar Expiry</th>
        <th>Vouchar Associated Mobile</th>
        <th>Quantity</th>
        <th>Vouchar Status</th>
        <th>Options</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($data as $data)
      <tr>
        <td>{{$data->vouchar_name}}</td>
        <td>{{$data->vouchar_prize}}</td>
        <td>{{$data->vouchar_expiry}}</td>
        <td>{{$data->vouchar_associated_mobile}}</td>
        <td>{{$data->quantity}}</td>
        <td>{{$data->vouchar_status}}</td>
        <td>
<a href="{{url('backend/voucharmaster/edit',$data->id)}}" class="btn btn-bg-blue btn-sm btn-tooltip"><i class="bi bi-pen" aria-hidden="true"></i></a>   
<button class="btn btn-bg-danger btn-sm btn-tooltip" onclick="deleteField({{ $data->id }})"><i class="bi bi-trash" aria-hidden="true"></i></button>
{{-- <a href="{{route('voucharmaster.delete',$data->id)}}" class="btn btn-bg-danger btn-sm btn-tooltip"><i class="bi bi-trash"  aria-hidden="true"></i></a>  --}}
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
    text: "Do you really want to remove this item from the Vouchar?",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, remove it!'
   }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = '/backend/voucharmaster/delete/' + id;
    }
   })
  }
</script>

@endsection

