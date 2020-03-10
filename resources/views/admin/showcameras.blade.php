@extends('layouts.admin')
@section('content')
<div class="row">
<div class="col-lg-12">
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
              Agregar Nueva Cámara
            </div>
            <div class="card-content">
          <form class="col s12" action="/add/camaras" method="post">
            {{ csrf_field() }}
          <div class="row">
          <div class="input-field col s6">
          <input id="agregar_camara" name="Nombre" type="text" class="validate">
          <label for="agregar_camara"> Nombre Cámara</label>
          <button type="submit" class="waves-effect waves-light btn">Agregar</button>
          </div>
          </div>
          </form>
          <div class="clearBoth"></div>
          </div>
      </div>
    </div>
</div>
@stop
