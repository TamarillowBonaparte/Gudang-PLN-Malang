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
        <a class="nav-link " href="{{ url('home') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <!-- Daftar Permintaan Material Nav -->
      <li class="nav-item">
        <a class="nav-link " href="{{ url('daftar-permintaan-material') }}">
          <i class="bi bi-layout-text-sidebar"></i>
          <span>Daftar Permintaan Material</span>
        </a>
      </li><!-- End Daftar Permintaan Material Nav -->

      <!-- Surat Jalan Nav -->
      <li class="nav-item">
        <a class="nav-link " href="{{ url('surat-jalan') }}">
          <i class="bi bi-truck"></i>
          <span>Surat Jalan</span>
        </a>
      </li><!-- End Surat Jalan Nav -->

      <!-- Material Nav -->
      <li class="nav-item">
        <a class="nav-link " href="{{ url('material') }}">
          <i class="bi bi-box"></i>
          <span>Material</span>
        </a>
      </li><!-- End Material Nav -->

      <!-- Material Nav -->
      <li class="nav-item">
        <a class="nav-link " href="{{ url('daftar-akun') }}">
          <i class="bi bi-person"></i>
          <span>Daftar Akun</span>
        </a>
      </li><!-- End Material Nav -->

      <!-- ... (rest of the sidebar content) ... -->
    </ul>
  </aside><!-- End Sidebar-->
