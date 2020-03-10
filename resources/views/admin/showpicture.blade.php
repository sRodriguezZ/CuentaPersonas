@extends('layouts.admin')
@section('content')
<!-- Contenido graficos -->
<div class="row">
<div class="col-lg-12">
@if (session()->has('success'))
          <div class="alert alert-dismissible alert-success">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          {{ session('success') }}
      </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="card">
      <div class="card-action">
            Agregar Nueva Obra
            </div>
            <div class="card-content">
            <form class="col s12" action="/add/cuadro" method="post">
              {{ csrf_field() }}
            <div class="row">
            <div class="input-field col s6">
            <input type="text" name="autor" class="validate">
            <label for="agregar_camara">Autor</label>
            </div>
            <div class="input-field col s6">
            <input type="text" name="nombreobra" class="validate">
            <label for="agregar_camara">Nombre Obra</label>
            </div>
            </div>
            <button type="submit" class="waves-effect waves-light btn">Agregar</button>
            </form>
            <div class="clearBoth"></div>
            </div>
          </div>
        </div>
    </div>
<footer>
@stop
