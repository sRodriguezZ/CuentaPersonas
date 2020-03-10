@extends('layout')

@section('content')
<?php  $nommes = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");  ?>
 <h1 class="page-header">Listado de visitas y vistas de <?php  echo $nommes[date("n")-1]; ?></h1>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
              <th>N°</th>
              <th>Autor</th>
              <th>Pintura</th>
              <th>Visitas</th>
              <th>Vistas</th>
            </tr>
        </thead>
        <tbody>
          <?php $index = 1; ?>
            @foreach($json as $pic)
            <tr>
              <td>{{$index++}}</td>
              <td>{{ $pic->author }}</td>
              <td>{{ $pic->name }}</td>
              <td>{{ $pic->ultrasound }}</td>
              <td>{{ $pic->camera }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
