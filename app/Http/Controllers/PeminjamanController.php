<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datapeminjaman=DB::table('peminjaman')
        ->select('id_peminjaman', 'kode_barang', 'id_peminjam', 'jumlah_pinjam', 'tgl_pinjam', 'batas', 'tgl_kembali', 'kondisi_awal', 'kondisi_kembali', 'terlambat', 'denda', 'status', 'nama', 'name', 'barang.id as id_barang')
        ->join('barang', 'barang.kode', '=', 'peminjaman.kode_barang')
        ->join('users', 'users.id', '=', 'peminjaman.id_peminjam')
        ->orderBy('id_peminjaman', 'asc')
        ->get();


        $datapeminjamanu=DB::table('peminjaman')
        ->select('id_peminjaman', 'kode_barang', 'id_peminjam', 'jumlah_pinjam', 'tgl_pinjam', 'batas', 'tgl_kembali', 'kondisi_awal', 'kondisi_kembali', 'terlambat', 'denda', 'status', 'nama', 'name', 'barang.id as id_barang')
        ->join('barang', 'barang.kode', '=', 'peminjaman.kode_barang')
        ->join('users', 'users.id', '=', 'peminjaman.id_peminjam')
        ->where('id_peminjam', Auth::user()->id)
        ->orderBy('id_peminjaman', 'asc')
        ->get();

        return view('peminjaman/peminjaman', compact('datapeminjaman'), compact('datapeminjamanu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datauser=User::all();

        $datauseru=DB::table('users')
        ->select('id', 'name')
        ->where('id', Auth::user()->id)
        ->get();

        $databarang=Barang::all();

        return view('peminjaman/input', compact('datauser', 'datauseru', 'databarang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_peminjam' => 'required',
            'kode_barang' => 'required',
            'jumlah_pinjam' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'status' => 'required',
        ]);


        $receive = Peminjaman::create([
            'id_peminjam' => $request->id_peminjam,
            'kode_barang' => $request->kode_barang,
            'jumlah_pinjam' => $request->jumlah_pinjam,
            'tgl_pinjam' => $request->tgl_pinjam,
            'batas' => $request->tgl_kembali,
            'status' => $request->status,
        ]);

            return redirect('/peminjaman');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $datapeminjaman = Peminjaman::findOrFail($id);
        $datapeminjaman->delete();
        
        return redirect('/peminjaman');
    }

    public function process(Request $request, $id)
    {
        $datapeminjaman = Peminjaman::findOrFail($id);
        
        $this->validate($request, [
            'status' => 'required',
        ]);

        $datapeminjaman->update([
            'status' => $request->status,
        ]);

            return redirect('/peminjaman');
    }

    public function proces($id)
    {
        $datapeminjaman = Peminjaman::findOrFail($id);
        return view('peminjaman/process', compact('datapeminjaman'));
    }

    public function complete($id)
    {
        $datapeminjaman = Peminjaman::findOrFail($id);
        return view('peminjaman/complete', compact('datapeminjaman'));
    }


    public function processp(Request $request, $id)
    {
        $databarang = Peminjaman::findOrFail($id);

        $databarang->update([
            'kondisi_awal' => $request->kondisi_awal,
            'status' => $request->status,
        ]);

        $databarang->update([
            'kondisi_awal' => $request->kondisi_awal,
            'status' => $request->status,
        ]);

        return redirect('/peminjaman');
    }

    public function completes(Request $request, $id)
    {
        $databarang = Peminjaman::findOrFail($id);

        $databarang->update([
            'kondisi_kembali' => $request->kondisi_kembali,
            'status' => $request->status,
        ]);

        $tanggal = new \DateTime('today');

        $databarang->update([
            'kondisi_kembali' => $request->kondisi_kembali,
            'tgl_kembali' => $tanggal,
            'status' => $request->status,
        ]);

        return redirect('/peminjaman');
    }
}
