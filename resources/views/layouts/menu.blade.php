<li class="c-sidebar-nav-item"> 
    @if (auth()->user()->level=="admin")
    <a class="c-sidebar-nav-link c-active" href="{{ route('admin.home') }}">
        <i class="c-sidebar-nav-icon cil-home"></i>Admin
    </a>
    <a class="c-sidebar-nav-link c-active" href="{{ url('admin/user') }}">
        <i class="c-sidebar-nav-icon fas fa-users"></i>User
    </a>
    <a class="c-sidebar-nav-link c-active" href="{{ url('admin/pengaduan') }}">
        <i class="c-sidebar-nav-icon far fa-sticky-note"></i>Pengaduan
    </a>
    @endif
    @if (auth()->user()->level=="masyarakat")
    <a class="c-sidebar-nav-link c-active" href="{{ route('masyarakat.home') }}">
        <i class="c-sidebar-nav-icon cil-home"></i>masyarakat
    </a>
    <a class="c-sidebar-nav-link c-active" href="{{ route('masyarakat.pengaduan') }}">
        <i class="c-sidebar-nav-icon far fa-sticky-note"></i>Pengaduan
    </a>
    @endif
    @if (auth()->user()->level=="pimpinan")
    <a class="c-sidebar-nav-link c-active" href="{{ route('pimpinan.home') }}">
        <i class="c-sidebar-nav-icon cil-home"></i>Pimpinan
    </a>
    <a class="c-sidebar-nav-link c-active" href="{{ route('pimpinan.pengaduan') }}">
        <i class="c-sidebar-nav-icon far fa-sticky-note"></i>Pengaduan
    </a>
    @endif

</li>
