@extends('layout.panel')

@section('title')
{{ Str::title($status) }} Blog
@endsection

@section('javascript-vendor')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

@section('javascript-custom')
<script>
  tinymce.init({
    selector: 'textarea'
  });
</script>
@endsection

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <div class="card-title m-0 text-capitalize">{{ $status }} Blog</div>

      <a href="{{ route('admin.blog.index') }}" class="btn btn-outline-secondary">
        <i data-feather="chevron-left"></i> Back
      </a>
    </div>

    <form method="POST" action="{{ $route }}" enctype="multipart/form-data">
      @csrf
      @if ($status === 'edit')
        @method('PUT')
      @endif

      <div class="card-body">
        <div class="mb-2">
          <label for="category_id">Category</label>
          <select required class="form-select" name="category_id" id="category_id" {{ $status === 'show' ? 'disabled' : ""}}>
            @foreach ($category as $item)
                <option value="{{ $item->id }}" {{ $status !== 'create' && $data->category_id === $item->id ? "selected" : "" }} {{ $status === 'show' ? 'disabled' : ""}}>{{ $item->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-2">
          <label for="title">Title</label>
          <input required type="text" id="title" class="form-control" name="title" value="{{ $status === 'create' ? '' : $data->title }}" {{ $status === 'show' ? 'disabled' : ""}} />
        </div>

        <div class="mb-2">
          <label for="slug">Slug</label>
          <input required type="text" id="slug" class="form-control" name="slug" value="{{ $status === 'create' ? '' : $data->slug }}" {{ $status === 'show' ? 'disabled' : ""}} />
        </div>

        @if ($status !== 'create')
        <label>Image</label><br>
        <img src="{{ Storage::url($data->image) }}" alt="{{ $data->name }}" style="max-height: 300px; max-width: 300px" />
        @endif
        @if ($status !== 'show')
        <div class="mb-2">
          <label for="image">{{ $status === 'edit' ? 'Change ' : ''}}Image</label>
          <input {{ $status === 'create' ? "required" : "" }} type="file" id="image" class="form-control" name="image" />
        </div>
        @endif

        <div class="mb-2">
          <label for="description">Description</label>
          <textarea id="description" name="description" {{ $status === 'show' ? 'disabled' : ""}}>
            {{ $status === 'create' ? '' : $data->description }}
          </textarea>
        </div>
      </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
</div>
@endsection