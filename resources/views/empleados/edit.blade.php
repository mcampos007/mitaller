@extends('layouts.panel')

@section('content')
<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Modificación Empleado</h3>
      </div>
      <div class="col text-right">
        <a href="{{ url('empleados')}}" class="btn btn-sm btn-default">Cancelar y volver</a>
      </div>
    </div>
  </div>
  <div class="card-body">
      @if($errors->any())
          <div class="text-center text-muted mb-4">
              <small>Oops ! Se encontraron un errorres.</small>
          </div>
          <div class="alert alert-danger" role="alert">
              @foreach($errors->all() as $error)
                <li><strong>Error!</strong> {{ $error}}</li>
              @endforeach
          </div>
      @endif  

      <form action=" {{ url('empleados/'.$empleado->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre del empleado</label>
            <input type="text" name="name" class="form-control" value="{{old('name', $empleado->name)}}" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" name="email" class="form-control" value="{{old('email', $empleado->email)}}" required>
        </div>
        <div class="form-group">
            <label for="dni">Dni</label>
            <input type="text" name="dni" class="form-control" value="{{old('dni', $empleado->dni)}}" >
        </div>
        <div class="form-group">
            <label for="address">Dirección</label>
            <input type="text" name="address" class="form-control" value="{{old('address', $empleado->address)}}" >
        </div>
        <div class="form-group">
            <label for="phone">Teléfono</label>
            <input type="text" name="phone" class="form-control" value="{{old('phone', $empleado->phone)}}" >
        </div> 
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="text" name="password" class="form-control" value="" >
        </div>    
         <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
     
  </div>
  
</div>
@endsection

