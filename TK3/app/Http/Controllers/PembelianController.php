<?php

namespace App\Http\Controllers;

use App\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{
    public function beliBarang(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);
        $jumlah_beli = $request->input('jumlah_beli');
        
        if (Auth::user()->role == "pembeli") {
            if ($barang->stok >= $jumlah_beli) {
                $barang->stok -= $jumlah_beli;
                $barang->save();
                
                return redirect()->back()->with('success', 'Barang berhasil dibeli.');
            } else {
                return redirect()->back()->with('error', 'Stok barang tidak mencukupi.');
            }
        } else {
            return redirect()->back()->with('error', 'Hanya pembeli yang dapat membeli barang.');
        }
    }
}
