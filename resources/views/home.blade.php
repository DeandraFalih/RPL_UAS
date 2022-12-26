@php
$role = Auth::user()->role;
$email_verified_at = Auth::user()->email_verified_at;
@endphp
@if($email_verified_at == "")
<script>window.location = "/verif";</script>
@else
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ url ('skd/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ url ('skd/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ url ('skd/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="{{ url ('skd/dist/img/logosv.png') }}" alt="logosv" height="60" width="60">
  </div>

  <nav class="main-header navbar navbar-expand navbar-dark">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url ('/') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url ('barang') }}" class="nav-link">Barang</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url ('peminjaman') }}" class="nav-link">Peminjaman</a>
      </li>
    @if ($role == "admin")
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url ('user') }}" class="nav-link">Data User</a>
      </li>
    @endif
    </ul>

    <ul class="navbar-nav ml-auto">
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="?" class="brand-link">
      <img src="{{ url ('skd/dist/img/logosv.png') }}" alt="SV Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Inventaris SV</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ url ('skd/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>


@yield('konten')


  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script src="{{ url ('skd/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ url ('skd/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url ('skd/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ url ('skd/dist/js/adminlte.js') }}"></script>

<script src="{{ url ('skd/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ url ('skd/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ url ('skd/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ url ('skd/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<script src="{{ url ('skd/plugins/chart.js/Chart.min.js') }}"></script>

<script src="{{ url ('skd/dist/js/pages/dashboard2.js') }}"></script>
</body>
</html>
@endif