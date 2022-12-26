@extends('home')

@section('konten')
<head>
  <title>Data Barang</title>
</head>
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
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-briefcase"></i>
              <p>
                Barang
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url ('barang') }}" class="nav-link active">
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
            <a href="{{ url ('barang') }}" class="nav-link active">
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

  <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Barang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Barang</a></li>
              <li class="breadcrumb-item active">Data Barang</li>
            </ol>
          </div>
        </div>
        @if ($role == "admin")
        <a href="{{ url ('inputbarang') }}" class="btn btn-primary">Tambah Data</a>
        @endif
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Barang</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">

                    <div class="input-group-append">
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Merk</th>
                      <th>Satuan</th>
                      <th>Keterangan</th>
                      <th>Kondisi</th>
                      <th>Depresiasi</th>
                      <th>Lama</th>
                      <th>Harga</th>
                      <th>Lokasi</th>
                      <th>Jumlah</th>
                      @if ($role == "admin")
                      <th>Tanggal Input</th>
                      <th>Tindakan</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($databarang as $data)
                    <tr>
                      <td>{{ $data->kode }}</td>
                      <td>{{ $data->nama }}</td>
                      <td>{{ $data->merk }}</td>
                      <td>{{ $data->satuan }}</td>
                      <td>{{ $data->keterangan }}</td>
                      <td>{{ $data->kondisi }}</td>
                      <td>{{ $data->depresiasi }}</td>
                      <td>{{ $data->lama }}</td>
                      <td>{{ $data->harga }}</td>
                      <td>{{ $data->lokasi }}</td>
                      <td>{{ $data->jumlah }}</td>
                      @if ($role == "admin")
                      <td>{{ $data->tgl_input }}</td>
                      <td>
                      <form method="post" action="{{ url('deletebarang/'.$data->id) }}">
                      @csrf
                      @method('DELETE')
                      <a class="btn btn-primary btnset2" href="{{ url('editbarang/'.$data->id) }}">Edit</a>
                        <input type="submit" name="delete" class="btn btn-danger" value="Delete" onclick = "return confirm('Hapus Data ?')">
                      </form>
                      @endif
                    </td>
                    </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

@endsection