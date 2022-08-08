<div class="main-sidebar sidebar-style-2" tabindex="1" style="overflow: hidden; outline: none;">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">SARPRAS APP</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">SA</a>
      </div>
      <ul class="sidebar-menu">
        <li>
          <a href="{{ route('dashboard') }}" class="nav-link">
            <i class="fas fa-fire"></i><span>Dashboard</span>
        </a>
        </li>
        <li class="menu-header">Data Master</li>
        <li class="dropdown">
          <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
            <i class="fas fa-columns"></i> <span>Bangunan</span>
        </a>
          <ul class="dropdown-menu">
            <li><a class="nav-link" href="{{ route('bangunan.index') }}">Bangunan Utama</a></li>
            <li><a class="nav-link" href="{{ route('sub-bangunan.index') }}">Sub Bangunan</a></li>
            <li><a class="nav-link" href="{{ route('ruangan.index') }}">Ruangan</a></li>
          </ul>
        </li>
        <li><a class="nav-link" href="{{ route('kategori.index') }}"><i class="far fa-square"></i> <span>Kategori</span></a></li>           
        <li><a class="nav-link" href="#"><i class="fas fa-pencil-ruler"></i> <span>Barang</span></a></li>
      </ul>
    </aside>
  </div>