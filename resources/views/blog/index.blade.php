@extends('layout.front')

@section('title')
Stories
@endsection

@section('content')
<section class="pt-3">
  <div class="container">
    <div class="text-center">
      <h1 class="text-primary">Our Stories</h1>
    </div>

    <section>
      <div class="row justify-content-center">
        @foreach ($data as $item)
          <a href="{{ route('blog.show', $item->slug) }}" class="col-lg-4 col-md-6 text-dark" style="text-decoration: none;">
            <div class="text-center">
              <img class="w-100" src="{{ Storage::url($item->image) }}" alt="{{ $item->name }}" style="height: 300px; background-color: gray; object-fit: cover;" />
            </div>

            <div class="d-flex flex-wrap my-1">
              <div>
                <h5 class="m-0"><span class="badge bg-primary">{{ $item->categories_name }}</span></h5>
              </div>
            </div>

            <section>
              <h3>{{ $item->title }}</h3>
              <p class="text-truncate">{{ strip_tags($item->description) }}</p>
            </section>
          </a>
        @endforeach
      </div>
    </section>
  </div>
</section>
@endsection