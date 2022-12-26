<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index()
    {
        $databarang=Barang::all();
        return view('barang/barang', compact('databarang'));
    }


    public function create()
    {
        $databarang=DB::table('barang')
        ->get();
        return view('barang/input', compact('databarang'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required',
            'nama' => 'required',
            'merk' => 'required',
            'satuan' => 'required',
            'keterangan' => 'required',
            'kondisi' => 'required',
            'depresiasi' => 'required',
            'lama' => 'required',
            'harga' => 'required',
            'lokasi' => 'required',
            'jumlah' => 'required',
        ]);

        $tanggal = new \DateTime('today');


        $receive = Barang::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'merk' => $request->merk,
            'satuan' => $request->satuan,
            'keterangan' => $request->keterangan,
            'kondisi' => $request->kondisi,
            'depresiasi' => $request->depresiasi,
            'lama' => $request->lama,
            'harga' => $request->harga,
            'lokasi' => $request->lokasi,
            'jumlah' => $request->jumlah,
            'tgl_input' => $tanggal,
        ]);
        if ($receive){
            return redirect('/barang');
        }
    }

    public function destroy($id)
    {
        $databarang = Barang::findOrFail($id);
        $databarang->delete();
        
        return redirect('/barang');
    }

    public function edit($id)
    {
        $databarang = Barang::findOrFail($id);
        return view('barang/edit', compact('databarang'));
    }

    public function update(Request $request, $id)
    {
        $databarang = Barang::findOrFail($id);

        $databarang->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'merk' => $request->merk,
            'satuan' => $request->satuan,
            'keterangan' => $request->keterangan,
            'kondisi' => $request->kondisi,
            'depresiasi' => $request->depresiasi,
            'lama' => $request->lama,
            'harga' => $request->harga,
            'lokasi' => $request->lokasi,
            'jumlah' => $request->jumlah,
        ]);

        $databarang->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'merk' => $request->merk,
            'satuan' => $request->satuan,
            'keterangan' => $request->keterangan,
            'kondisi' => $request->kondisi,
            'depresiasi' => $request->depresiasi,
            'lama' => $request->lama,
            'harga' => $request->harga,
            'lokasi' => $request->lokasi,
            'jumlah' => $request->jumlah,
        ]);

        return redirect('/barang');
    }
}
