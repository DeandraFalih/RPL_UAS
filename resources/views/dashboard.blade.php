@extends('home')

@section('konten')
@php
$role = Auth::user()->role;
@endphp
<head>
  <title>Dashboard</title>
</head>      
	<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false">
          <li class="nav-item">
            <a href="{{ url ('/') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

      @if ($role == "admin")
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Barang
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url ('barang') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Data Barang</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url ('inputbarang') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Data Barang</p>
                </a>
              </li>
            </ul>
          </li>


      @else
        <ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false">
          <li class="nav-item">
            <a href="{{ url ('barang') }}" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Barang
              </p>
            </a>
          </li>
        @endif

      @if ($role == "admin")
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Peminjaman
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url ('peminjaman') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Peminjaman Barang</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url ('inputpeminjaman') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input Peminjaman</p>
                </a>
              </li>
            </ul>
          </li>


      @else
        <ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false">
          <li class="nav-item">
            <a href="{{ url ('peminjaman') }}" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Peminjaman
              </p>
            </a>
          </li>
        @endif

    	@if ($role == "admin")
        <ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false">
          <li class="nav-item">
            <a href="{{ url ('user') }}" class="nav-link">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Data User
              </p>
            </a>
          </li>
        </ul>
        @endif

        <ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false">
          <li class="nav-item">
            <a href="{{ url('logout') }}" class="nav-link">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
    </aside>

<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <h1><b>Selamat Datang di Inventaris Sekolah Vokasi</b></h1>
  </div>
</div>

@endsection