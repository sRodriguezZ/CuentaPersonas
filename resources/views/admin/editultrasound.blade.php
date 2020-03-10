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
<div class="card">
        <div class="card-action">
            Editar Ultrasonido
            </div>
            <div class="card-content">
            <form class="col s12" action="/update/ultrasonido" method="post">
              {{ csrf_field() }}
            <div class="row">
            <div class="input-field col s6">
            <input  type="hidden" name="uid" class="validate" value="{{ $ultrasounds->id }}">
            <input  type="text" name="number_of" class="validate" value="{{ $ultrasounds->number_of }}">
            <label for="agregar_camara"> Nombre Ultrasonido</label>
            <button type="submit" class="waves-effect waves-light btn">Editar</button>
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
