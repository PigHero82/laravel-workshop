@extends('layout.front')

@section('title')
Lorem Ipsum
@endsection

@section('content')
<section>
  <div class="py-5" style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{{ asset('images/banner-background.jpg') }}') no-repeat center">
    <div class="container">
      <div class="text-center">
        <img src="{{ Storage::url($data->image) }}" alt="{{ $data->name }}" style="max-height: 400px; background-color: gray" />
        
        <section class="mt-5">
          <h4 class="text-white">{{ $data->categories_name }}</h4>
          <h1 class="text-primary">{{ $data->title }}</h1>
          <h4 class="text-white">{{ date("M d, Y", strtotime($data->created_at)) }}</h4>
        </section>
      </div>
    </div>
  </div>

  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <section class="blog-content">
          {!! $data->description !!}
        </section>

        <section class="mb-3">
          <hr>

          <h3>Comment</h3>

          <form method="POST" action="">
            @csrf
            <input class="form-control mb-3" name="name" placeholder="Your name" />
            <textarea class="form-control mb-3" placeholder="Your comment" rows="4"></textarea>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

          <hr>
        </section>

        @foreach ($comments as $item)
          <section>
            <h4>{{ $item->name }}</h4>
            <p>{{ $item->description }}</p>
          </section>
        @endforeach
      </div>
    </div>
  </div>

  <div class="py-3" style="background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('{{ asset('images/banner-background.jpg') }}') no-repeat center">
    <div class="container">
      <h1 class="text-white text-center mb-5">Another Stories</h1>

      <div class="row justify-content-center">
        @foreach ($blog as $item)
          <a href="{{ route('blog.show', $item->slug) }}" class="col-lg-4 col-md-6 text-white" style="text-decoration: none;">
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
    </div>
  </div>
</section>
@endsection