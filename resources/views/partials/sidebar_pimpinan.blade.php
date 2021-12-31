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
    <li class="nav-item {{(request()->is('pimpinan')) ? 'nav-item active' : ''}}">
        <a class="nav-link " href="{{route('pimpinan')}}">
            <i class="fas fa-fw fa-home "></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-book"></i>
            <span>Laporan</span>
        </a>
        <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <h6 class="collapse-header">Custom Utilities:</h6> -->
                <a style="color: black;" class="collapse-item" href="{{route('pimpinan_laporan_pekerjaan')}}">Pekerjaan</a>
                <a style="color: black;" class="collapse-item" href="{{route('pimpinan_laporan_pengawasan_k3')}}">Pengawasan K3</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
  

</ul>