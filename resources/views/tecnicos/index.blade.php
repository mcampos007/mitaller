@extends('layouts.panel')
@section('title','Técnicos')
@section('subtitle','')
@section('content')
<div class="row justify-content-center">   
</div>
<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Técnicos</h3>
      </div>
      <div class="col text-right">
        <a href="{{ url('/tecnicos/create')}}" class="btn btn-sm btn-default">Nuevo Técnico</a>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush">
      <thead class="thead-light">
        <tr>
          <th scope="col">Técnico</th>
          <th scope="col">Descripción</th>
          <th scope="col">opciones</th>
        </tr>
      </thead>
      <tbody>
        @foreach($tecnicos as $tecnico)
          <tr>
          <th scope="row">
            {{$tecnico->name}}
          </th>
          <td>
            {{$tecnico->description}}
          </td>
          <td>
            <a href="{{ url('tecnicos/'.$tecnico->id.'/edit')}}" class="btn btn-sm btn-primary">Editar </a>
            <a href="" class="btn btn-sm btn-danger">Eliminar </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection

