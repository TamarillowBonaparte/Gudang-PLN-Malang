<style>
    /* Sidebar styles */
    .sidebar {
        width: 250px;
        transition: width 0.3s ease;
    }

    /* Hidden sidebar */
    .sidebar.hidden {
        width: 0;
        overflow: hidden;
    }

    .sidebar .nav-link.active {
        color: #fff; /* Text color for active item */
        background-color: #0d6efd; /* Background color for active item */
    }

    .sidebar .nav-link.active .bi {
        color: #fff; /* Icon color for active item */
    }

    /* Ensure main content adjusts when sidebar is hidden */
    .main-content {
        transition: margin-left 0.3s ease;
        margin-left: 250px;
    }

    .main-content.shifted {
        margin-left: 0;
    }

    /* Toggle button */
    .toggle-btn {
        position: absolute;
        top: 20px;
        left: 20px;
        cursor: pointer;
        z-index: 1000;
    }
</style>

<!-- Toggle Button -->


<!--Side Bar-->
<aside id="sidebar2" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <!-- Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('gudangbawah') ? 'active' : '' }}" href="{{ url('gudangbawah') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <!-- Riwayat Surat Nav -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('gudangbawahhistory') ? 'active' : '' }}" href="{{ url('gudangbawahhistory') }}">
                <i class="bi bi-layout-text-sidebar"></i>
                <span>Riwayat Surat</span>
            </a>
        </li><!-- End Riwayat Surat Nav -->

        <!-- Buat Surat Jalan Nav -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('buatsuratjalanadmin') ? 'active' : '' }}" href="{{ url('buatsuratjalanadmin') }}">
                <i class="bi bi-file-text"></i>
                <span>Buat Surat Jalan</span>
            </a>
        </li><!-- End Buat Surat Jalan Nav -->

        <!-- ... (rest of the sidebar content) ... -->
    </ul>
</aside><!-- End Sidebar-->
<script>;

</script>
