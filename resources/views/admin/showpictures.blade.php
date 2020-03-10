@extends('layouts.admin')
@section('content')
@if (session()->has('success'))
        <div class="alert alert-dismissible alert-success">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{ session('success') }}
    </div>
@endif
<div class="card">
      <div class="card-action">
            Lista de Obras
            </div>
            <div class="card-content">
              <div class="table-responsive">

              <div class="row">
                </div>
<table class="table  table-striped table-bordered table-hover" id="pictures">
  <thead>
    <tr>
      <th>#</th>
      <th>Nombre Obras</th>
      <th>Autor</th>
      <th>Acción</th>
    </tr>
  </thead>
<tbody>
  @foreach($pictures as $picture)
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $picture->name }}</td>
    <td>{{ $picture->author }}</td>
    <td><a href="/show/cuadro/{{ $picture->id }}" class="btn btn-warning">Editar</a> <a href="/delete/cuadro/{{ $picture->id }}" class="btn btn-danger">Eliminar</a> </td>
  </tr>
  @endforeach
</tbody>
</table>

</div>
</div>
</div>

<script>
$(document).ready( function () {
  $('#pictures').dataTable( {
      "language": {
          "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
      },
      dom: 'Bfrtip',
      buttons: [
          'copy', 'csv', 'excel', 'pdf', 'print'
      ]
  } );
} );
</script>
@stop
