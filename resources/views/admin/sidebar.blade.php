<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
  <span class="align-middle">DATA SERVER</span>
</a>

<ul class="sidebar-nav">
    <li class="sidebar-header">
        Pages
    </li>

    <li class="sidebar-item {{ (request()->is('dashboard')) ? 'active' : ''}}">
        <a class="sidebar-link" href="/dashboard">
            <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
        </a>
    </li>

    <li class="sidebar-item {{ (request()->is('server-data') || request()->is('server-data/create') || request()->is('server-data/*/edit')) ? 'active' : ''}}">
        <a class="sidebar-link" href="/server-data">
            <i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Data Server</span>
        </a>
    </li>

    <li class="sidebar-item {{ (request()->is('data-vm') || request()->is('data-vm/create') || request()->is('data-vm/*/edit')) ? 'active' : ''}}">
        <a class="sidebar-link" href="/data-vm">
            <i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Data VM</span>
        </a>
    </li>

    <li class="sidebar-item {{ (request()->is('data-aplikasi') || request()->is('data-aplikasi/create') || request()->is('data-aplikasi/*/edit') || request()->is('data-aplikasi/*')) ? 'active' : ''}}">
        <a class="sidebar-link" href="/data-aplikasi">
            <i class="align-middle" data-feather="server"></i> <span class="align-middle">Data Aplikasi</span>
        </a>
    </li>
    <!-- Dropdown Menu with Arrow -->
    {{-- <li class="sidebar-item">
        <a data-bs-target="#dropdownExample" data-bs-toggle="collapse" class="sidebar-link collapsed">
            <i class="align-middle" data-feather="folder"></i> 
            <span class="align-middle">Dropdown Menu</span>
            <i class="align-middle float-end" data-feather="chevron-right"></i> <!-- Icon for Arrow -->
        </a>
        <ul id="dropdownExample" class="sidebar-dropdown list-unstyled collapse">
            <li class="sidebar-item"><a class="sidebar-link" href="sub-item-1.html">Sub Item 1</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="sub-item-2.html">Sub Item 2</a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="sub-item-3.html">Sub Item 3</a></li>
        </ul>
    </li> --}}

    <li class="sidebar-item">
        <a class="sidebar-link" href="/logout">
            <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Log Out</span>
        </a>
    </li>

  

    
</ul>
</nav>