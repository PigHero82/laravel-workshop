@extends('layout.front')

@section('title')
Stories
@endsection

@section('content')
<section>
  <div class="position-relative">
    <img class="w-100" src="{{ asset('images/banner-background.jpg') }}" alt="Banner Background" style="height: 720px; object-fit: cover; background-color: gray; filter: brightness(70%);" />

    <div class="position-absolute top-50 start-0 translate-middle-y w-100">
      <div class="container d-flex flex-lg-row flex-column justify-content-lg-between justify-content-center align-items-center">
        <div class="text-white text-lg-start text-center mb-lg-0 mb-4">
          <h3 class="mb-0 fw-normal">Hello! you are welcome to</h3>
          <h2 class="mb-0 display-3">Our Stories</h2>
        </div>

        <img src="{{ asset('images/banner-illustration.svg') }}" alt="Banner Illustration" style="width: 600px;" />
      </div>
    </div>
  </div>
</section>

<section class="my-3">
  <div class="container">
    <div class="d-flex align-items-center justify-content-between">
      <h1 class="text-primary">Latest</h1>

      <a href="/blog" class="text-uppercase" style="text-decoration: none;">
        View all stories <i data-feather="arrow-right-circle"></i>
      </a>
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

<section>
  <div class="position-relative">
    <img class="w-100" src="{{ asset('images/banner-background.jpg') }}" alt="Banner Background" style="height: 720px; object-fit: cover; background-color: gray; filter: brightness(70%);" />

    <div class="position-absolute top-50 start-0 translate-middle-y w-100">
      <div class="container d-flex flex-lg-row flex-column justify-content-lg-start justify-content-center align-items-center">
        <img src="{{ asset('images/profile-image.jpg') }}" alt="Profile Image" style="height: 500px;" />

        <div class="text-white text-lg-start text-center mb-lg-0 mb-4 ms-lg-5">
          <h2>Cheryl P Medina</h2>
          <div>October 23, 1991</div>
          <div>Syracuse, New York(NY), 13221</div>
          <div>315-254-4221</div>
          <div>cheryl@mail.com</div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection