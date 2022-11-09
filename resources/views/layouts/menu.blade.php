<li class="c-sidebar-nav-item">
    @if (auth()->user()->level=="admin")
    <a class="c-sidebar-nav-link c-active" href="{{ route('admin.home') }}">
        <i class="c-sidebar-nav-icon cil-home"></i>Admin
    </a>
    @endif
    @if (auth()->user()->level=="masyarakat")
    <a class="c-sidebar-nav-link c-active" href="{{ route('masyarakat.home') }}">
        <i class="c-sidebar-nav-icon cil-home"></i>masyarakat
    </a>
    @endif
    @if (auth()->user()->level=="pimpinan")
    <a class="c-sidebar-nav-link c-active" href="{{ route('pimpinan.home') }}">
        <i class="c-sidebar-nav-icon cil-home"></i>Pimpinan
    </a>
    @endif

</li>
