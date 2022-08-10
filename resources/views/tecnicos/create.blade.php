@extends('layouts.panel')

@section('content')
<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Datos del Nuevo Técnico</h3>
      </div>
      <div class="col text-right">
        <a href="{{ url('tecnicos')}}" class="btn btn-sm btn-default">Cancelar y volver</a>
      </div>
    </div>
  </div>
  <div class="card-body">
      <form action=" {{ url('tecnicos')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre del Técnico</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Descripción del técnico</label>
            <input type="text" name="description" class="form-control">
        </div>    
         <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
     
  </div>
  
</div>
@endsection
