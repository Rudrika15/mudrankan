@extends('back_end.layout.layout')
@section('title')
Category Show
@endsection

@section('body')

<div class="container mt-3 px-5">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="card-title">Market View</h4>
        <a href="{{ route('market.create') }}" class="btn btn-bg-orange btn-sm mt-3 btn-tooltip"><i
          class="bi bi-plus-circle"></i>
      <span class="btn-text">Add Market</span></a>
    </div>
      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      <div class="table-responsive">
        <table id="myDataTable" class="table table-striped table-hover">
          <thead>
            <tr>
              <th>{{__('Category Name')}}</th>
              <th>{{__('Description')}}</th>
              <th>{{__('Address')}}</th>
              <th>{{__('Longitude')}}</th>
              <th>{{__('Latitude')}}</th>
              <th>{{__('Phone')}}</th>
              <th>{{__('Mobile')}}</th>
              <th>{{__('Information')}}</th>
              <th>{{__('Admin Commision')}}</th>
              <th>{{__('Delivery Fee')}}</th>
              <th>{{__('Delivery Range')}}</th>
              <th>{{__('Default Tax')}}</th>
              <th>{{__('Close')}}</th>
              <th>{{__('Active')}}</th>
              <th>{{__('Available For Delivery')}}</th>
              <th>{{__('Option')}}</th>
            </tr>
          </thead>
          <tbody>
            @foreach( $data as $data)
            <tr>
              <td>{{$data->name}}</td>
              <td>{!! $data->description !!}</td>
              <td>{!!$data->address!!}</td>
              <td>{{$data->longitude}}</td>
              <td>{{$data->latitude}}</td>
              <td>{{$data->phone}}</td>
              <td>{{$data->mobile}}</td>
              <td>{!!$data->information!!}</td>
              <td>{{$data->admin_commision}}</td>
              <td>{{$data->delivery_fee}}</td>
              <td>{{$data->delivery_range}}</td>
              <td>{{$data->default_tax}}</td>
              <td>{{$data->close}}</td>
              <td>{{$data->active}}</td>
              <td>{{$data->available_for_delivery}}</td>
              <td>
                <a href="{{ url('backend/market/edit',$data->id) }}" class="btn btn-bg-blue btn-sm btn-tooltip"><i class="bi bi-pen" aria-hidden="true"></i></a>
                <a href="{{ route('market.delete',$data->id)}}" class="btn btn-bg-danger btn-sm btn-tooltip"><i class="bi bi-trash"
                      aria-hidden="true"></i></a>
                @endforeach
              </td>
            </tr>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
{{-- <script>
  $(document).ready(function () {
    $('#myDataTable').DataTable({
      "scrollY": "400px", 
      "scrollX": true, 
      "paging": true,
      "searching": true, 
    });
  });
</script> --}}
@endsection