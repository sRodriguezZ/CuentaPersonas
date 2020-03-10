@extends('layouts.admin')
@section('content')
<div class="card">
      <div class="card-action">
            Editar Obras
            </div>
            <div class="card-content">
            <form class="col s12" action="/update/cuadro" method="post">
              {{ csrf_field() }}
            <div class="row">
            <div class="input-field col s6">
            <input type="hidden" name="id" value="{{ $pictures->id }}">
            <input type="text" name="author" value="{{ $pictures->author }}">
            <label for="agregar_camara">Autor</label>
            </div>
            <div class="input-field col s6">
            <input type="text" name="nombrecuadro" class="validate" value="{{ $pictures->name }}">
            <label for="agregar_camara">Nombre Obra</label>
            </div>
            </div>
            <button type="submit" class="waves-effect waves-light btn">Editar</button>
            </form>
            <div class="clearBoth"></div>
            </div>
          </div>
        </div>
    </div>
@stop
