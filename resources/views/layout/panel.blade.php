<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/logo.jpg') }}" />
    <link rel="apple-touch-icon" href="{{ asset('images/logo.jpg') }}" />
    <title>@yield('title', 'Stories')</title>

    <!-- CSS: Vendor -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" />
    @yield('css-vendor')
  </head>

  <body>
    <section class="bg-light fixed-top">
      <div class="container d-flex justify-content-between align-items-center">
        <a href="/">
          <img src="{{ asset('images/logo.jpg') }}" alt="Logo" style="width: 80px; mix-blend-mode: multiply;" />
        </a>

        <section>
          <a href="/admin/blog" class="text-dark ms-3" style="text-decoration: none;">Blog</a>
          <a href="{{ route('admin.category.index') }}" class="text-dark ms-3" style="text-decoration: none;">Category</a>
        </section>
      </div>
    </section>

    <section style="margin-top: 80px;">
      <div class="container py-2">
        <h1>@yield('title')</h1>
      </div>

      @yield('content')
    </section>

    <!-- Javascript:Vendor -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    @yield('javascript-vendor')
    
    <!-- Javascript:Custom -->
    <script>
      feather.replace()
    </script>
    @yield('javascript-custom')
  </body>
</html>