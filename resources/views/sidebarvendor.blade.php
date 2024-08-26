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
            <a class="nav-link " href="{{ url('vendor') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <!-- Daftar Permintaan Material Nav -->
        <li class="nav-item">
            <a class="nav-link " href="{{ url('dpm') }}">
                <i class="bi bi-box-seam"></i>
                <span>DPM/DPB</span>
            </a>
        </li><!-- End Daftar Permintaan Material Nav -->

        <!-- Surat Jalan Nav -->
        <li class="nav-item">
            <a class="nav-link " href="{{ url('k7') }}">
                <i class="bi bi-tools"></i>
                <span>K7</span>
            </a>
        </li><!-- End Surat Jalan Nav -->

        <!-- Material Nav -->
        <li class="nav-item">
            <a class="nav-link " href="{{ url('k3') }}">            
                <i class="bi bi-box-arrow-left"></i>
                <span>K3</span>
            </a>
        </li>
        <!-- End Material Nav -->

        <!-- ... (rest of the sidebar content) ... -->
    </ul>
  </aside><!-- End Sidebar-->