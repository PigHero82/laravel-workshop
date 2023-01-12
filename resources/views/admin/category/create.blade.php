@extends('layout.panel')

@section('title')
Create Category
@endsection

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <div class="card-title m-0">Create Category</div>

      <a href="{{ route('admin.category.index') }}" class="btn btn-outline-secondary">
        <i data-feather="chevron-left"></i> Back
      </a>
    </div>

    <form method="POST" action="{{ route('admin.category.store') }}">
      @csrf

      <div class="card-body">
        <div class="mb-2">
          <label for="name">Name</label>
          <input type="text" id="name" class="form-control" name="name" />
        </div>
      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>
@endsection