<style>
    .sidebar .nav-link.active {
  color: #fff; /* Text color for active item */
  background-color: #0d6efd; /* Background color for active item */
}

.sidebar .nav-link.active .bi {
  color: #fff; /* Icon color for active item */
}

</style>

<!--Side Bar-->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <!-- Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('vendor') ? 'active' : '' }}" href="{{ route('vendor') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->


      <li class="nav-item">
        {{-- <a class="nav-link {{ Request::routeIs('daftar.permintaan.material') ? 'active' : '' }}" href="{{ route('daftar.permintaan.material') }}"> --}}
          <i class="bi bi-layout-text-sidebar"></i>
          <span>DPM/DPB</span>
        </a>
      </li><!-- End Daftar Permintaan Material Nav -->

      <!-- Surat Jalan Nav -->
      <li class="nav-item">
        {{-- <a class="nav-link {{ Request::routeIs('surat.jalan') ? 'active' : '' }}" href="{{ route('surat.jalan') }}"> --}}
          <i class="bi bi-truck"></i>
          <span>K7</span>
        </a>
      </li><!-- End Surat Jalan Nav -->

      <!-- Material Nav -->
      <li class="nav-item">
        {{-- <a class="nav-link {{ Request::routeIs('material') ? 'active' : '' }}" href="{{ route('material') }}"> --}}
          <i class="bi bi-box"></i>
          <span>K3</span>
        </a>
      </li><!-- End Material Nav -->


      <!-- ... (rest of the sidebar content) ... -->
    </ul>
  </aside><!-- End Sidebar-->
