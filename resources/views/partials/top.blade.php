<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
                <img class="img-profile rounded-circle" src="{{asset('public/admin_master/img/user.png')}}">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <!-- <div class="dropdown-divider"></div> -->
                 @if(Auth::user()->role == "pengawas")
                <a class="dropdown-item"  href="{{ route('logout-pengawas') }}">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
                @endif

                @if(Auth::user()->role == "petugas")
                <a class="dropdown-item"  href="{{ route('logout-petugas') }}">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
                @endif

                @if(Auth::user()->role == "pimpinan")
                <a class="dropdown-item"  href="{{ route('logout-pimpinan') }}">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
                @endif
            </div>
        </li>

    </ul>

</nav>