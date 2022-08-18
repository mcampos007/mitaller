<!-- Navigation -->
<h6 class="navbar-heading text-muted">Gestión de Datos</h6>
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" href="./index.html">
      <i class="ni ni-tv-2 text-red"></i> Dashboard
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/trabajos')}}">
      <i class="ni ni-planet text-blue"></i> Trabajos
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=" {{ url('/tecnicos')}}">
      <i class="ni ni-single-02 text-orange"></i> Técnicos
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href=" {{ url('/empleados')}}">
      <i class="ni ni-single-02 text-orange"></i> Empleados
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ url('/clientes')}}">
      <i class="ni ni-satisfied  text-info"></i> Clientes
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('logout')}}" onclick="event.preventDefault();document.getElementById('formLogout').submit();">
      <i class="ni ni-key-25 "></i> Cerrar sesión
    </a>
   <form action="{{ route('logout')}}" method="POST" style="display: none;" id="formLogout" >
    @csrf
  </form>
  </li>
</ul>
<!-- Divider -->
<hr class="my-3">
<!-- Heading -->
<h6 class="navbar-heading text-muted">Reportes</h6>
<!-- Navigation -->
<ul class="navbar-nav mb-md-3">
  <li class="nav-item">
    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html">
      <i class="ni ni-collection text-yellow"></i> Trabajos Pendientes
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html">
      <i class="ni ni-spaceship text-red"></i> Trabajos Realizados
    </a>
  </li>
</ul>