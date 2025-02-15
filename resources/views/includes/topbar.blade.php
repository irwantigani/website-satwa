 <!-- ======= Header ======= -->
 <header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="index.html" class="logo d-flex align-items-center">
  
    <span class="d-none d-lg-block">Satwa</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->
<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->

    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-bell"></i>
        <span class="badge bg-primary badge-number">4</span>
      </a><!-- End Notification Icon -->

      

    </li><!-- End Notification Nav -->

    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-chat-left-text"></i>
        <span class="badge bg-success badge-number">3</span>
      </a><!-- End Messages Icon -->
    </li><!-- End Messages Nav -->

    <li class="nav-item dropdown pe-3">
    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
    <!-- Gambar Profil atau Inisial -->
    @if(Auth::user() && Auth::user()->profile_image)
        <img src="{{ Auth::user()->profile_image }}" alt="Profile" class="rounded-circle">
    @else
        <!-- Inisial Nama Pengguna -->
        <div class="profile-initials rounded-circle d-flex align-items-center justify-content-center">
            @if(Auth::user())
                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}{{ strtoupper(substr(Auth::user()->name, -1)) }}
            @else
                G
            @endif
        </div>
    @endif
    <!-- Nama Pengguna -->
    <span class="d-none d-md-block dropdown-toggle ps-2">
       
    </span>
</a>


<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
    <li class="dropdown-header">
        <h6>{{ Auth::user()->name ?? 'Guest' }}</h6>
        <span>{{ Auth::user()->email ?? 'No Email' }}</span>
    </li>
    <li>
        <hr class="dropdown-divider">
    </li>
    <li>
    <a class="dropdown-item d-flex align-items-center" href="{{ route('profile.show') }}">
    <i class="bi bi-person"></i>
    <span>My Profile</span>
</a>
</ul>
   
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<style>
  .profile-initials {
    width: 30px;
    height: 30px;
    background-color: #007bff; /* Warna latar belakang */
    color: #fff; /* Warna teks */
    font-size: 18px; /* Ukuran teks */
    font-weight: bold; /* Ketebalan teks */
    text-transform: uppercase; /* Huruf kapital */
    text-align: center;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%; /* Membuat lingkaran */
}



</style>
<!-- Notification Message Display -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif