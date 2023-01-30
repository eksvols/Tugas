<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'deskripsi' => 'required',
            'jenis_barang' => 'required',
            'stok_barang' => 'required|integer',
            'harga' => 'required|integer',
            'gambar_barang' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $gambar_barang = $request->file('gambar_barang');
        $nama_file = time().'.'.$gambar_barang->getClientOriginalExtension();
        $gambar_barang->move(public_path('images/barang'), $nama_file);

        $barang = new Barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->deskripsi = $request->deskripsi;
        $barang->jenis_barang = $request->jenis_barang;
        $barang->stok_barang = $request->stok_barang;
        $barang->harga = $request->harga;
        $barang->gambar_barang = $nama_file;
        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $barang->nama = $request->input('nama');
        $barang->deskripsi = $request->input('deskripsi');
        $barang->jenis = $request->input('jenis');
        $barang->stok = $request->input('stok');
        $barang->harga = $request->input('harga');
        $barang->gambar = $request->input('gambar');
        $barang->save();
        return redirect()->route('barang.index')->with('success','Data Barang Berhasil Diubah');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus');
    }


}