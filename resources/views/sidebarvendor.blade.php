<style>
    .sidebar .nav-link.active {
        color: #fff;
        background-color: #0d6efd;
    }
    .sidebar .nav-link.active .bi {
        color: #fff;
    }
    .sidebar .nav-item .collapse.show .nav-link {
        padding-left: 2rem;
    }
    .sidebar .nav-link {
        color: #333;
        transition: color 0.3s ease, background-color 0.3s ease;
    }
    .sidebar .nav-link:hover {
        color: #fff;
        background-color: #0d6efd;
    }
    .sidebar .nav-link:hover .bi {
        color: #fff;
    }
</style>

<!-- Sidebar -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <!-- Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('daftar-akun') ? 'active' : '' }}" href="{{ url('vendor') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

       <!-- Daftar Permintaan Material Nav dengan Submenu History -->
       <li class="nav-item">
        <a class="nav-link {{ Request::is('dpm') || Request::is('dpm/history') ? '' : 'collapsed' }}" href="#dpmSubmenu" data-bs-toggle="collapse">
            <i class="bi bi-box-seam"></i>
            <span>DPM/DPB</span>
            <i class="bi bi-chevron-down ms-auto"></i>
        </a>

        <!-- Submenu untuk DPM dan History -->
        <ul id="dpmSubmenu" class="nav flex-column collapse {{ Request::is('dpm') || Request::is('dpm/history') ? 'show' : '' }}">
            <li>
                <a class="nav-link {{ Request::is('dpm') ? 'active' : '' }}" href="{{ url('dpm') }}">
                    <i class="bi bi-file-earmark"></i>
                    <span>DPM</span>
                </a>
            </li>
            <li>
                <a class="nav-link {{ Request::is('dpm/history') ? 'active' : '' }}" href="{{ url('historydpm') }}">
                    <i class="bi bi-clock-history"></i>
                    <span>History</span>
                </a>
            </li>
        </ul>
    </li>

       <!-- K7 Nav dengan Submenu -->
       <li class="nav-item">
        <a class="nav-link {{ Request::is('k7') || Request::is('k7/history') ? '' : 'collapsed' }}" href="#k7Submenu" data-bs-toggle="collapse">
            <i class="bi bi-tools"></i>
            <span>K7</span>
            <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="k7Submenu" class="nav flex-column collapse {{ Request::is('k7') || Request::is('k7/history') ? 'show' : '' }}">
            <li>
                <a class="nav-link {{ Request::is('k7') ? 'active' : '' }}" href="{{ url('k7') }}">
                    <i class="bi bi-file-earmark"></i>
                    <span>K7</span>
                </a>
            </li>
            <li>
                <a class="nav-link {{ Request::is('k7/history') ? 'active' : '' }}" href="{{ url('historyk7') }}">
                    <i class="bi bi-clock-history"></i>
                    <span>History K7</span>
                </a>
            </li>
        </ul>
    </li>

        <!-- K3 Nav dengan Submenu -->
        <li class="nav-item">
            <a class="nav-link {{ Request::is('k3') || Request::is('k3/history') ? '' : 'collapsed' }}" href="#k3Submenu" data-bs-toggle="collapse">
                <i class="bi bi-box-arrow-left"></i>
                <span>K3</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="k3Submenu" class="nav flex-column collapse {{ Request::is('k3') || Request::is('k3/history') ? 'show' : '' }}">
                <li>
                    <a class="nav-link {{ Request::is('k3') ? 'active' : '' }}" href="{{ url('k3') }}">
                        <i class="bi bi-file-earmark"></i>
                        <span>K3</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ Request::is('k3/history') ? 'active' : '' }}" href="{{ url('historyk3') }}">
                        <i class="bi bi-clock-history"></i>
                        <span>History K3</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var currentUrl = window.location.href;
        var navLinks = document.querySelectorAll('.sidebar .nav-link');

        navLinks.forEach(function(link) {
            if (link.href === currentUrl) {
                link.classList.add('active');
                var collapseParent = link.closest('.collapse');
                if (collapseParent) {
                    collapseParent.classList.add('show');
                    var parentLink = collapseParent.previousElementSibling;
                    if (parentLink) parentLink.classList.remove('collapsed');
                }
            }
        });
    });
</script>
