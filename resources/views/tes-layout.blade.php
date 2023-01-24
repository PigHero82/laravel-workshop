<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>

  <link rel="stylesheet" type="text/css" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" />
</head>
<body>
  <section class="bg-primary">
    <div class="d-flex align-items-center justify-content-center" style="height: 20vh">
      <h1 class="text-white text-center m-0">Header</h1>
    </div>
  </section>

  <section class="bg-secondary">
    <div class="d-flex align-items-center justify-content-center" style="height: 60vh">
      <h1 class="text-white text-center m-0">Body</h1>
    </div>
  </section>

  <section class="bg-dark">
    <div class="d-flex align-items-center justify-content-center" style="height: 20vh">
      <h1 class="text-white text-center m-0">Footer</h1>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>