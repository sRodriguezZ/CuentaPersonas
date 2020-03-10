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
            Agregar Nuevo Tótem
            </div>
            <div class="card-content">
            <form class="col s12" action="/add/totems" method="post">
              {{ csrf_field() }}
            <div class="row">
            <div class="input-field col s6">
            <input type="text" name="Nombre" class="validate">
            <label for="agregar_camara">Nombre</label>
            </div>
            <div class="input-field col s6">
            <input type="number" value="1" name="Piso" class="validate">
            <label for="agregar_camara">Piso</label>
            </div>
            <div class="input-field col s6">
              <select class="form-control" name="Sede">
                <option value="">Seleccionar Sede...</option>
                @foreach($headquarters as $headquarter)
                  <option value="{{ $headquarter->id }}">{{ $headquarter->city }}</option>
                @endforeach
              </select>
            </div>
            <div class="input-field col s6">
              <select class="form-control" name="Pintura">
                <option value="">Seleccionar Pintura...</option>
                @foreach($pictures as $picture)
                  <option value="{{ $picture->id }}">{{ $picture->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="input-field col s6">
              <select class="form-control" name="Camara">
                <option value="">Seleccionar Camara...</option>
                @foreach($cameras as $camera)
                  <option value="{{ $camera->id }}">{{ $camera->number_of }}</option>
                @endforeach
              </select>
            </div>
            <div class="input-field col s6">
              <select class="form-control" name="Ultrasonido">
                <option value="">Seleccionar Ultrasonido...</option>
                @foreach($ultrasounds as $ultrasound)
                  <option value="{{ $ultrasound->id }}">{{ $ultrasound->number_of }}</option>
                @endforeach
              </select>
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
