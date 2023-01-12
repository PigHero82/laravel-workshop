@extends('layout.panel')

@section('title')
  Category
@endsection

@section('css-vendor')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css" integrity="sha512-1k7mWiTNoyx2XtmI96o+hdjP8nn0f3Z2N4oF/9ZZRgijyV4omsKOXEnqL1gKQNPy2MTSP9rIEWGcH/CInulptA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap4.min.css" integrity="sha512-BMbq2It2D3J17/C7aRklzOODG1IQ3+MHw3ifzBHMBwGO/0yUqYmsStgBjI0z5EYlaDEFnvYV7gNYdD3vFLRKsA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('javascript-vendor')
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js" integrity="sha512-F0E+jKGaUC90odiinxkfeS3zm9uUT1/lpusNtgXboaMdA3QFMUez0pBmAeXGXtGxoGZg3bLmrkSkbK1quua4/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@section('javascript-custom')
<script>
  $(document).ready( function () {
    $('table').DataTable();
  } );
</script>
@endsection

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
      <div>Data Category</div>

      <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
        <i data-feather="plus"></i> Add Data
      </a>
    </div>

    <div class="card-body">
      <section>
        @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
          </div>
        @endif
  
        @if ($message = Session::get('error'))
          <div class="alert alert-danger alert-block">
            <strong>{{ $message }}</strong> 
          </div>
        @endif
      </section>

      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr class="text-center">
              <th style="width: 50px">ID</th>
              <th style="width: 50px"></th>
              <th>Name</th>
            </tr>
          </thead>
    
          <tbody>
            @foreach ($data as $item)
              <tr>
                <td class="text-center align-middle">{{ $item->id }}</td>
                <td>
                  <div class="btn-group">
                    <a href="{{ route('admin.category.show', $item->id) }}" class="btn btn-sm btn-info text-white"><i data-feather="eye" size="14"></i></a>
                    <a href="{{ route('admin.category.edit', $item->id) }}" class="btn btn-sm btn-warning text-white"><i data-feather="edit-2"></i></a>
                    <button type="button" class="btn btn-sm btn-danger" onclick="deleteData({{ $item->id }})"><i data-feather="trash-2"></i></button>

                    <form id="form-{{ $item->id }}" method="POST" action="{{ route('admin.category.destroy', $item->id) }}">
                      @csrf
                      @method('DELETE')
                    </form>
                  </div>
                </td>
                <td class="align-middle">{{ $item->name }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
  function deleteData(data) {
    document.getElementById(`form-${data}`).submit()
  }
</script>
@endsection