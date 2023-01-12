<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" href="{{ asset('images/logo.jpg') }}" />
    <link rel="apple-touch-icon" href="{{ asset('images/logo.jpg') }}" />
    <title>@yield('title', 'Stories')</title>

    <!-- CSS: Vendor -->
    <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" />
    
    <!-- CSS: Custom -->
    <style>
      .blog-content {
        font-size: 1.5rem
      }
    </style>
  </head>

  <body>
    <section class="bg-light fixed-top">
      <div class="container d-flex justify-content-between align-items-center">
        <a href="/">
          <img src="{{ asset('images/logo.jpg') }}" alt="Logo" style="width: 80px; mix-blend-mode: multiply;" />
        </a>

        <section>
          <a href="/blog" class="text-dark ms-3" style="text-decoration: none;">Stories</a>
          <a href="/admin" class="text-dark ms-3" style="text-decoration: none;">Panel</a>
        </section>
      </div>
    </section>

    <section style="margin-top: 80px;">
      @yield('content')

      <footer class="text-center d-flex flex-column">
        <a href="https://unsplash.com/photos/SoB70WFVWGU" target="_blank" style="text-decoration: none;">© unsplash.com | 2020 | Pawel Czerwinski</a>
        <a href="https://unsplash.com/photos/RfoISVdKM4U" target="_blank" style="text-decoration: none;">© unsplash.com | 2017 | Valerie Elash</a>
        <a href="https://undraw.co" target="_blank" style="text-decoration: none;">© undraw.co | Katerina Limpitsouni</a>
        <a href="https://www.freepik.com/free-vector/modern-logo-letter-u-abstract-gradient-color_30977664.htm#query=dummy%20logo&position=37&from_view=keyword" target="_blank" style="text-decoration: none;">© freepik.com | mhafiffuadi</a>
      </footer>
    </section>

    <!-- Javascript:Vendor -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Javascript:Custom -->
    <script>
      feather.replace()
      
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      })
    </script>
    @yield('javascript-custom')
  </body>
</html>