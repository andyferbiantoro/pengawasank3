<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon ">
            <img style="height: 50px; width: auto;" src="{{asset('public/admin_master/img/logo_pln.jpg')}}" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">Pengawasan K3 PLN Jajag</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{(request()->is('petugas')) ? 'nav-item active' : ''}}">
        <a class="nav-link" href="{{route('petugas')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{(request()->is('petugas_jadwal')) ? 'nav-item active' : ''}}">
        <a class="nav-link collapsed" href="{{route('petugas_jadwal')}}" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-calendar"></i>
            <span>Jadwal Pengawasan K3</span>
        </a>


    </li>



</ul>