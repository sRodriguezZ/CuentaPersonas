@extends('layouts.admin')
@section('content')
<div class="row">
<div class="col-lg-12">
<div class="card">
            <div class="card-action">
            Editar Cámara
            </div>
            <div class="card-content">
          <form class="col s12" action="/update/camaras" method="post">
            {{ csrf_field() }}
          <div class="row">
          <div class="input-field col s6">
          <input type="hidden"  name="cid" type="text" value="{{ $cameras->id }}" class="validate">
          <input id="agregar_camara" name="number_of" type="text" value="{{ $cameras->number_of }}" class="validate">
          <label for="agregar_camara"> Nombre Cámara</label>
          <button type="submit" class="waves-effect waves-light btn">Editar</button>
          </div>
          </div>
          </form>
          <div class="clearBoth"></div>
          </div>
      </div>
    </div>
</div>
@stop
