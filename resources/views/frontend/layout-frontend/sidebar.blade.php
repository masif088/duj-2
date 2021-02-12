<header class="main-nav">
  <div class="logo-wrapper">PT Wira Utama Jaya
    <div class="back-btn"><i class="fa fa-angle-left"></i></div>
    <div class="toggle-sidebar"><i class="status_toggle middle" data-feather="grid" id="sidebar-toggle"> </i></div>
  </div>
  <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt=""></a></div>
  <nav>
    <div class="main-navbar">
      <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
      <div id="mainnav">
        <ul class="nav-menu custom-scrollbar">
          <li class="back-btn"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt=""></a>
            <div class="mobile-back text-right"><span>Back</span><i class="fa fa-angle-right pl-2" aria-hidden="true"></i></div>
          </li>

          <li class="dropdown"><a class="nav-link menu-title" href="dashboard"><i data-feather="home"></i><span>Dashboard</span></a></li>
          <li class="dropdown"><a class="nav-link menu-title" href="list"><i data-feather="users"></i><span>User</span></a></li>
          <li class="dropdown"><a class="nav-link menu-title" href="semua"><i data-feather="file-text"></i><span>Semua Barang</span></a></li>
          <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="box"> </i><span>Aktifasi Barcode</span></a></li>
          <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="box"> </i><span>Kelola Barang</span></a>
            <ul class="nav-submenu menu-content">
              <li><a href="{{route('barang.create')}}">Nama Barang</a></li>
              {{-- @if (auth()->user()->role != 'teknisi') --}}
              <li><a href="{{route('masuk.index')}}">List Barang Masuk</a></li>
              {{-- @endif --}}
            </ul>
          </li>
          <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="box"> </i><span>Kelola Mutasi</span></a>
            <ul class="nav-submenu menu-content">
              <li><a href="{{route('barang.create')}}">Mutasi</a></li>
              {{-- @if (auth()->user()->role != 'teknisi') --}}
              <li><a href="{{route('masuk.index')}}">Riwayat Mutasi</a></li>
              {{-- @endif --}}
            </ul>
          </li>
          <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="box"> </i><span>Kelola Infrastruktur</span></a>
            <ul class="nav-submenu menu-content">
              <li><a href="{{route('barang.create')}}">Infrastruktur</a></li>
              {{-- @if (auth()->user()->role != 'teknisi') --}}
              <li><a href="{{route('masuk.index')}}">Service Infrastruktur</a></li>
              {{-- @endif --}}
            </ul>
          </li>
          <li class="dropdown"><a class="nav-link menu-title" href="#"><i data-feather="box"> </i><span>Kelola Aftersale</span></a>
            <ul class="nav-submenu menu-content">
              <li><a href="{{route('barang.create')}}">Aftersale</a></li>
            </ul>
          </li>
          <li class="dropdown"><a class="nav-link menu-title " href="{{route('gudang.index')}}"><i data-feather="monitor"> </i><span>Kelola Gudang</span></a></li>
          <li class="dropdown"><a class="nav-link menu-title " href="{{route('suplier.index')}}"><i data-feather="monitor"> </i><span>Kelola Suplier</span></a></li>

        </div>
      <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </div>
  </nav>
</header>
