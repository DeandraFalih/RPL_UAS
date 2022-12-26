@extends('home')

@section('konten')
<title>
  Selesaikan Peminjaman
</title>
@php
$role = Auth::user()->role;
@endphp
  <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-accordion="false">
          <li class="nav-item">
            <a href="{{ url ('/') }}" class="nav-link">
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
                <a href="{{ url ('inputbarang') }}" class="nav-link active">
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
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Peminjaman
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url ('peminjaman') }}" class="nav-link active">
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
            <a href="{{ url ('peminjaman') }}" class="nav-link active">
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

    
  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Selesaikan Peminjaman</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Peminjaman</a></li>
              <li class="breadcrumb-item active">Selesaikan Peminjaman</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Input Peminjaman</h3>
              </div>
              <form method="post" action="{{ url('completepeminjaman/'.$datapeminjaman->id_peminjaman) }}">
                @csrf
                @method('PUT')
                <input type="hidden" name="status" value="Completed">
                <div class="card-body">
                  <div class="form-group">
                    <label for="kondisi_kembali">Kondisi Kembali</label><br/>
                    <select name="kondisi_kembali" class="form-control">
                      <option value="Baik">Baik</option>
                      <option value="Kurang Baik">Kurang Baik</option>
                      <option value="Rusak">Rusak</option>
                  </select>
                  </div>
                </div>
                <div class="card-footer">
                  <input type="submit" name="Proses" class="btn btn-primary" value="Submit">
                </div>
              </form>
            </div>
@endsection