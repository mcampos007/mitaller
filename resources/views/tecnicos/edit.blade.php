@extends('layouts.panel')

@section('content')
<div class="card shadow">
  <div class="card-header border-0">
    <div class="row align-items-center">
      <div class="col">
        <h3 class="mb-0">Edición de los datos del  Técnico</h3>
      </div>
      <div class="col text-right">
        <a href="{{ url('tecnicos')}}" class="btn btn-sm btn-default">Cancelar y volver</a>
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
      <form action=" {{ url('tecnicos/'.$tecnico->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre del Técnico</label>
            <input type="text" name="name" class="form-control" value="{{old('name', $tecnico->name)}}" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción del técnico</label>
            <input type="text" name="description" class="form-control" value="{{old('description', $tecnico->description)}}" >
        </div>    
         <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
     
  </div>
  
</div>
@endsection
