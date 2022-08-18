@extends('layouts.panel')

@section('content')
<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Empleados</h3>
      </div>
      <div class="col text-right">
        <a href="{{ url('empleados/create')}}" class="btn btn-sm btn-success">Nuevo empleado</a>
      </div>
    </div>
  </div>
  <div class="card-body">
    @if (session('notification'))
      <div class="alert alert-success" role="alert">
          <strong>{{ session('notification') }}</strong> 
      </div>
    @endif  
  </div>
  
  <div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush">
      <thead class="thead-light">
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">E-mail</th>
          <th scope="col">Dni</th>
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($empleados as $empleado)
          <tr>
            <th scope="row">
              {{ $empleado->name}}
            </th>
            <td>
              {{ $empleado->email}}
            </td>
            <td>
              {{ $empleado->dni}}
            </td>
            <td>
              
              <form action=" {{ url('/empleados/'.$empleado->id)}}" method="POST">
                @csrf
                @method("DELETE")
                <a href="{{ url('empleados/'.$empleado->id.'/edit')}}" class="btn btn-sm btn-primary">Editar </a>
                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
              </form>
            </td>
          <tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

