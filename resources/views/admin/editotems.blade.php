@extends('layouts.admin')
@section('content')
<div class="row">
<div class="col-lg-12">
<div class="card">
            <div class="card-action">
            Editar Totem
            </div>
            <div class="card-content">
              <form class="col s12" action="/update/totem" method="post">
                {{ csrf_field() }}
              <div class="row">
              <div class="input-field col s6">
              <input type="hidden" name="id" value="{{ $totems->id }}" >
              <input type="text" name="number_of" value="{{ $totems->number_of }}" >
              <label for="agregar_camara">Nombre</label>
              </div>
              <div class="input-field col s6">
              <input type="number" value="{{ $totems->floor }}" name="floor" class="validate">
              <label for="agregar_camara">Piso</label>
              </div>
              <div class="input-field col s6">
                <select class="form-control" name="headquarter">
                  <option value="">Seleccionar Sede...</option>
                  @foreach($headquarters as $headquarter)
                    @if($totems->headquarter_id == $headquarter->id)
                    <option value="{{ $headquarter->id }}" selected>{{ $headquarter->city }}</option>
                    @else
                    <option value="{{ $headquarter->id }}">{{ $headquarter->city }}</option>
                    @endif
                  @endforeach
                </select>
              </div>
              <div class="input-field col s6">
                <select class="form-control" name="picture">
                  <option value="">Seleccionar Pintura...</option>
                  @foreach($pictures as $picture)
                    @if($totems->picture_id == $picture->id)
                    <option value="{{ $picture->id }}" selected>{{ $picture->name }}</option>
                    @else
                    <option value="{{ $picture->id }}">{{ $picture->name }}</option>
                    @endif
                  @endforeach
                </select>
              </div>
              <div class="input-field col s6">
                <select class="form-control" name="camera">
                  <option value="">Seleccionar Camara...</option>
                  @foreach($cameras as $camera)
                    @if($totems->camera_id == $camera->id)
                    <option value="{{ $camera->id }}" selected>{{ $camera->number_of }}</option>
                    @else
                    <option value="{{ $camera->id }}">{{ $camera->number_of }}</option>
                    @endif
                  @endforeach
                </select>
              </div>
              <div class="input-field col s6">
                <select class="form-control" name="ultrasound">
                  <option value="">Seleccionar Ultrasonido...</option>
                  @foreach($ultrasounds as $ultrasound)
                    @if($totems->ultrasound_id == $ultrasound->id)
                      <option value="{{ $ultrasound->id }}" selected>{{ $ultrasound->number_of }}</option>
                      @else
                      <option value="{{ $ultrasound->id }}">{{ $ultrasound->number_of }}</option>
                    @endif
                  @endforeach
                </select>
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
