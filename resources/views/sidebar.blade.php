<style>
    .sidebar .nav-link.active {
        color: #fff; /* Text color for active item */
        background-color: #0d6efd; /* Background color for active item */
    }
    .sidebar .nav-link.active .bi {
        color: #fff; /* Icon color for active item */
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

    /* Style untuk parent dropdown */
    .nav-link[data-bs-toggle="collapse"] {
        position: relative;
        color: #333 !important;
        background-color: transparent !important;
    }

    /* Style untuk arrow */
    .nav-link[data-bs-toggle="collapse"]::after {
        content: "\F282"; /* bi-chevron-down */
        font-family: "bootstrap-icons";
        position: absolute;
        right: 15px;
        transition: transform 0.3s ease;
        font-size: 14px;
    }

    /* Rotasi arrow saat menu dibuka */
    .nav-link[data-bs-toggle="collapse"]:not(.collapsed)::after {
        transform: rotate(180deg);
    }

    /* Hover effect untuk parent dropdown */
    .nav-link[data-bs-toggle="collapse"]:hover {
        color: #fff !important;
        background-color: #0d6efd !important;
    }

    .nav-link[data-bs-toggle="collapse"]:hover::after {
        color: #fff;
    }
</style>

<!--Side Bar-->
<aside id="sidebar2" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <!-- Dashboard Nav -->
      <li class="nav-item">
        <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="{{ url('home') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

     <!-- Daftar Surat Nav (with Dropdown) -->
    <li class="nav-item">
        <a class="nav-link collapsed"
           href="#"
           data-bs-toggle="collapse"
           data-bs-target="#submenuSurat">
            <i class="bi bi-file-text" style="color: #0d6efd;"></i>
            <span>Daftar Surat</span>
        </a>
        <ul id="submenuSurat" class="collapse list-unstyled">
          <li>
            <a class="nav-link {{ Request::is('daftar-permintaan-material') ? 'active' : '' }}" href="{{ url('daftar-permintaan-material') }}">
              <i class="bi bi-layout-text-sidebar"></i>
              <span>Daftar Permintaan Material</span>
            </a>
          </li>
          <li>
            <a class="nav-link {{ Request::is('bonpengembalianmaterial') ? 'active' : '' }}" href="{{ route('bonpengembalianmaterial') }}">
                <i class="bi bi-arrow-left-right"></i>
                <span>Bon Pengembalian Material</span>
            </a>
          </li>
          <li>
            <a class="nav-link {{ Request::is('bonpemakaianmaterial') ? 'active' : '' }}" href="{{ route('bonpemakaianmaterial') }}">
                <i class="bi bi-clipboard"></i>
                <span>Bon Pemakaian Material</span>
              </a>
          </li>
        </ul>
      </li><!-- End Daftar Surat Nav -->

      <!-- Material Nav -->
      <li class="nav-item">
        <a class="nav-link {{ Request::is('material') ? 'active' : '' }}" href="{{ url('material') }}">
          <i class="bi bi-box"></i>
          <span>Material</span>
        </a>
      </li><!-- End Material Nav -->

      <!-- Daftar Akun Nav -->
      <li class="nav-item">
        <a class="nav-link {{ Request::is('daftar-akun') ? 'active' : '' }}" href="{{ url('daftar-akun') }}">
          <i class="bi bi-person"></i>
          <span>Daftar Akun</span>
        </a>
      </li><!-- End Daftar Akun Nav -->

      <li class="nav-item">
        <a class="nav-link {{ Request::is('setting') ? 'active' : '' }}" href="{{ url('setting') }}">
            <i class="bi bi-gear"></i>
          <span>Setting</span>
        </a>
      </li><!-- End Daftar Akun Nav -->

      <!-- ... (rest of the sidebar content) ... -->
    </ul>
</aside><!-- End Sidebar-->

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
