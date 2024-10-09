
@extends('back_end.layout.layout')

@section('title') 
Permissions Create
@endsection

@section('body')


<div class="container mt-3 px-5">
    <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="card-title"> Add new permission</h4>
            <a href="{{route('permissions.index')}}" class="btn text-white" style="background-color: #e76a35">Back </a>
          </div>


        <div class="container mt-4">
            <form method="POST" action="{{ route('permissions.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ old('name') }}" 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn text-white" style="background-color: #1d3268">Save permission</button>
                {{-- <a href="{{ route('permissions.index') }}" class="btn btn-default">Back</a> --}}
            </form>
        </div>

    </div>
    </div>
</div>
    @endsection