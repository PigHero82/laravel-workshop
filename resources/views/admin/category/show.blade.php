@extends('layout.panel')

@section('title')
Show Category
@endsection

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <div class="card-title m-0">Show Category</div>

      <a href="{{ route('admin.category.index') }}" class="btn btn-outline-secondary">
        <i data-feather="chevron-left"></i> Back
      </a>
    </div>

    <div class="card-body">
      <div class="mb-2">
        <label for="name">Name</label>
        <input disabled type="text" id="name" class="form-control" name="name" value="{{ $data->name }}" />
      </div>
    </div>
  </div>
</div>
@endsection