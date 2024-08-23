<style>
    .sidebar .nav-link.active {
        color: #fff;
        background-color: #0d6efd;
    }

    .sidebar .nav-link.active .bi {
        color: #fff;
    }

    .submenu {
        display: none;
        padding-left: 20px;
    }

    .submenu.show {
        display: block;
    }

    .toggle-btn {
            position: absolute;
            right: 20px;
            font-size: 12px;
            line-height: 1;
        }

</style>

<!--Side Bar-->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <!-- Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}" href="#" onclick="toggleSubmenu(this)">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
                <span class="toggle-btn">▼</span>
            </a>
            <ul class="submenu">
                <li><a href="{{ route('dashboard') }}">Overview</a></li>
            </ul>
        </li>

        <!-- Daftar Permintaan Material Nav -->
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('gudang') ? 'active' : '' }}" href="#" onclick="toggleSubmenu(this)">
                <i class="bi bi-layout-text-sidebar"></i>
                <span>Surat Jalan DPM</span>
                <span class="toggle-btn">▼</span>
            </a>
            <ul class="submenu">
                <li><a href="{{ route('gudang.dpm') }}">List Surat Jalan DPM/DPB</a></li>
            </ul>
        </li>

        <!-- Surat Jalan Nav -->
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('surat.jalan') ? 'active' : '' }}" href="#" onclick="toggleSubmenu(this)">
                <i class="bi bi-truck"></i>
                <span>K3</span>
                <span class="toggle-btn">▼</span>
            </a>
            <ul class="submenu">
                <li><a href="{{ route('surat.jalan') }}">List Surat Jalan</a></li>
            </ul>
        </li>

        <!-- Material Nav -->
        <li class="nav-item">
            <a class="nav-link {{ Request::routeIs('material') ? 'active' : '' }}" href="#" onclick="toggleSubmenu(this)">
                <i class="bi bi-box"></i>
                <span>K7</span>
                <span class="toggle-btn">▼</span>
            </a>
            <ul class="submenu">
                <li><a href="{{ route('material') }}">List Material</a></li>
            </ul>
        </li>
    </ul>
</aside><!-- End Sidebar-->

<script>
function toggleSubmenu(element) {
    var submenu = element.nextElementSibling;
    if (submenu.classList.contains('show')) {
        submenu.classList.remove('show');
    } else {
        var allSubmenus = document.querySelectorAll('.submenu');
        allSubmenus.forEach(function(menu) {
            menu.classList.remove('show');
        });
        submenu.classList.add('show');
    }
}
</script>