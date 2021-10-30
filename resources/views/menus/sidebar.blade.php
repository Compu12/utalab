<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center py-auto" href="{{ route('index') }}">
        <div class="sidebar-brand-icon ">
            <img src="{{asset('img/Ico-UTA.png')}}" class="img-circle img-thumbnail " alt="">
            <div class="sidebar-brand-text mx-3">UTA-LAB</div>
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ (request()->routeIs('index*')) ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('index') }}">
            <i class="fas fa-house-user"></i>
            <span>Inicio</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Charts -->
    <li class="nav-item {{ (request()->routeIs('laboratoristas*')) ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('laboratoristas.index') }}">
            <i class="fas fa-users"></i>
            <span>Laboratoristas</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item {{ (request()->routeIs('clientes*')) ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('clientes.index') }}">
            <i class="fas fa-address-book"></i>
            <span>Clientes</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item {{ (request()->routeIs('analisis*')) ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('analisis.index') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Análisis</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-vials"></i>
            <span>Muestras</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Resultados</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item {{ (request()->routeIs('solicitudInterna*')) ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('solicitudInterna.index') }}">
            <i class="fas fa-scroll"></i>
            <span>Solicitud Interna</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
