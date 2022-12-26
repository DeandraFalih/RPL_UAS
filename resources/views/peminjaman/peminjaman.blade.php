@extends('home')

@section('konten')
<head>
  <title>Data Peminjaman</title>
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
            <h1>Data Peminjaman</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Peminjaman</a></li>
              <li class="breadcrumb-item active">Data Peminjaman</li>
            </ol>
          </div>
        </div>
        <a href="{{ url ('inputpeminjaman') }}" class="btn btn-primary">Tambah Data</a>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Peminjaman</h3>

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
                      <th>No Peminjaman</th>
                      @if ($role == "admin")
                      <th>Peminjam</th>
                      @endif
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Jumlah</th>
                      <th>Tanggal Pinjam</th>
                      <th>Batas Waktu</th>
                      <th>Tanggal Kembali</th>
                      <th>Kondisi Awal</th>
                      <th>Kondisi Kembali</th>
                      <th>Terlambat</th>
                      <th>Denda</th>
                      <th>Status</th>
                      <th>Tindakan</th>
                    </tr>
                  </thead>
                  <tbody>
                      @if ($role == "admin")
                      @foreach($datapeminjaman as $data)
                    <tr>
                      <td>{{ $data->id_peminjaman }}</td>
                      <td>{{ $data->name }}</td>
                      <td>{{ $data->kode_barang }}</td>
                      <td>{{ $data->nama }}</td>
                      <td>{{ $data->jumlah_pinjam }}</td>
                      <td>{{ $data->tgl_pinjam }}</td>
                      <td>{{ $data->batas }}</td>
                      <td>{{ $data->tgl_kembali }}</td>
                      <td>{{ $data->kondisi_awal }}</td>
                      <td>{{ $data->kondisi_kembali }}</td>
                      <td>{{ $data->terlambat }}</td>
                      <td>{{ $data->denda }}</td>
                      <td>{{ $data->status }}</td>
                      <td>
                        @php
                        $status = $data->status;
                        @endphp
                        @if($status == "Pending")

                      <form method="post" action="{{ url('acceptpeminjaman/'.$data->id_peminjaman) }}">
                      @csrf
                      @method('PUT')
                        <input type="hidden" name="status" value="Booked">
                        <input type="submit" name="accept" class="btn btn-primary" value="Accept" onclick = "return confirm('Terima Peminjaman ?')">
                      </form>

                      <form method="post" action="{{ url('rejectpeminjaman/'.$data->id_peminjaman) }}">
                      @csrf
                      @method('PUT')
                        <input type="hidden" name="status" value="Rejected">
                        <input type="submit" name="reject" class="btn btn-danger" value="Reject" onclick = "return confirm('Tolak Peminjaman ?')">
                      </form>

                        @elseif($status == "Booked")
                        
                      <a class="btn btn-primary btnset2" href="{{ url('processpeminjaman/'.$data->id_peminjaman) }}">Process</a>

                      <form method="post" action="{{ url('cancelpeminjaman/'.$data->id_peminjaman) }}">
                      @csrf
                      @method('PUT')
                        <input type="hidden" name="status" value="Canceled">
                        <input type="submit" name="cancel" class="btn btn-danger" value="Cancel" onclick = "return confirm('Batalkan Peminjaman ?')">
                      </form>

                        @elseif($status == "Process")
                
                        <a class="btn btn-primary btnset2" href="{{ url('complete/'.$data->id_peminjaman) }}">Complete</a>

                        @else
          
                      <form method="post" action="{{ url('deletepeminjaman/'.$data->id_peminjaman) }}">
                        @csrf
                        @method('DELETE')
                          <input type="submit" name="delete" class="btn btn-danger" value="Delete" onclick = "return confirm('Hapus Data ?')">
                        </form>

                        @endif
                      </td>
                  </tr>
                      @endforeach

                      @else
                      @foreach($datapeminjamanu as $data)
                    <tr>
                      <td>{{ $data->id_peminjaman }}</td>
                      <td>{{ $data->kode_barang }}</td>
                      <td>{{ $data->nama }}</td>
                      <td>{{ $data->jumlah_pinjam }}</td>
                      <td>{{ $data->tgl_pinjam }}</td>
                      <td>{{ $data->batas }}</td>
                      <td>{{ $data->tgl_kembali }}</td>
                      <td>{{ $data->kondisi_awal }}</td>
                      <td>{{ $data->kondisi_kembali }}</td>
                      <td>{{ $data->terlambat }}</td>
                      <td>{{ $data->denda }}</td>
                      <td>{{ $data->status }}</td>
                      <td>
                      </td>
                  </tr>
                      @endforeach
                      @endif
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>


@endsection