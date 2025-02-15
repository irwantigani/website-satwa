 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

<li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
    </a>
</li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('hewan_masuk.index') }}">
      <i class="bi bi-envelope"></i>
      <span>Hewan Masuk</span>
    </a>
</li>
<!-- End Contact Page Nav -->
<li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('hewan_keluar.index') }}">
      <i class="bi bi-envelope"></i>
      <span>Hewan keluar</span>
    </a>
</li>
  <li class="nav-heading"></li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-contact.html">
      <i class="bi bi-envelope"></i>
      <span>Contact</span>
    </a>
  </li><!-- End Contact Page Nav -->

  
<!-- End Register Page Nav -->


  <li class="nav-item">
  <a class="nav-link collapsed" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <i class="bi bi-box-arrow-in-right"></i>
    <span>Logout</span>
  </a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
  </form>
</li>

</aside><!-- End Sidebar-->
