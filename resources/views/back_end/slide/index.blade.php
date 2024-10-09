@extends('back_end.layout.layout')
@section('title')
Slide show
@endsection
@section('body')

<div class="container mt-3 px-5">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="card-title">Slide View</h4>
        <a href="{{ route('slide.create') }}" class="btn btn-bg-orange btn-sm mt-3 btn-tooltip"><i
            class="bi bi-plus-circle"></i>
          <span class="btn-text"> Add New Slide</span></a>
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
              <th>{{__('Order')}}</th>
              <th>{{__('Text')}}</th>
              <th>{{__('Button')}}</th>
              <th>{{__('Text Position')}}</th>
              <th>{{__('Text Color')}}</th>
              <th>{{__('Button Color')}}</th>
              <th>{{__('Background Color')}}</th>
              <th>{{__('Indicator Color')}}</th>
              <th>{{__('Image')}}</th>
              <th>{{__('Image Fit')}}</th>
              <th>{{__('Product')}}</th>
              <th>{{__('Market')}}</th>
              <th>{{__('Enabled')}}</th>
              <th>{{__('Option')}}</th>
            </tr>
          </thead>
          <tbody>
            @foreach( $data as $data)
            <tr>
              <td>{{$data->order_id}}</td>
              <td>{{$data->text}}</td>
              <td>{{$data->button}}</td>
              <td>{{$data->text_position}}</td>
              <td>{{$data->text_color}}</td>
              <td>{{$data->button_color}}</td>
              <td>{{$data->background_color}}</td>
              <td>{{$data->indicator_color}}</td>
              <td><img src="{{url('slidimg')}}/{{$data->image}}" class="img-thumbnail"
                  style="width: 100px; height: 100px; object-fit: cover; border-radius: 5px;"></td>
              <td>{{$data->image_fit}}</td>
              <td>{{$data->pname}}</td>
              <td>{{$data->mname}}</td>
              <td>{{$data->enabled}}</td>

              <td>
                <a href="{{ url('backend/slide/edit',$data->id) }}" class="btn btn-bg-blue btn-sm btn-tooltip"><i class="bi bi-pen" aria-hidden="true"></i></a>
                <a href="{{ route('slide.delete',$data->id)}}" class="btn btn-bg-danger btn-sm btn-tooltip"><i class="bi bi-trash"
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

@endsection