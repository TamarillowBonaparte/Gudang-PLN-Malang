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

      <!-- Daftar Permintaan Material Nav -->
      <li class="nav-item">
        <a class="nav-link {{ Request::is('daftar-permintaan-material') ? 'active' : '' }}" href="{{ url('daftar-permintaan-material') }}">
          <i class="bi bi-layout-text-sidebar"></i>
          <span>Daftar Permintaan Material</span>
        </a>
      </li><!-- End Daftar Permintaan Material Nav -->

      <!-- Surat Jalan Nav -->
      <li class="nav-item">
        <a class="nav-link {{ Request::is('surat-jalan') ? 'active' : '' }}" href="{{ url('surat-jalan') }}">
          <i class="bi bi-truck"></i>
          <span>Surat Jalan</span>
        </a>
      </li><!-- End Surat Jalan Nav -->

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