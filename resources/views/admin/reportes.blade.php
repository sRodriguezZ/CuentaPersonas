@extends('layouts.admin')
@section('content')
<div class="row">
<div class="col-md-12">
<div class="card">
<div class="card-content">
<div class="alert alert-success">
            <strong>Descargar PDF lista cuadros de visitas y vistas</strong> (lista.pdf).
            <a href="{{ route('tabla.pdf') }}" class="waves-effect waves-light btn">
                Descargar
            </a>
          </div>
          <div class="alert alert-info">
            <strong>Descargar PDF ranking de cuadros mas vistos</strong> (ranking.pdf).
            <a href="{{ route('rank.pdf') }}" class="waves-effect waves-light btn">
                Descargar
            </a>
           </div>
</div>
</div>
</div>
</div>
@stop
