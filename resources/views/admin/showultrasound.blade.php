@extends('layouts.admin')
@section('content')
<div id="page-inner">
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
            Agregar Nuevo Ultrasonido
            </div>
            <div class="card-content">
            <form class="col s12" action="/add/ultrasonidos" method="post">
              {{ csrf_field() }}
            <div class="row">
            <div class="input-field col s6">
            <input  type="text" name="Nombre" class="validate">
            <label for="agregar_camara"> Nombre Ultrasonido</label>
            <button type="submit" class="waves-effect waves-light btn">Agregar</button>
            </div>
             </div>
             </form>
             <div class="clearBoth"></div>
            </div>
           </div>
        </div>
      </div>
    </div>
@stop
