<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kasir;

class KasirController extends Controller
{
    public function create()
    {
        // Tampilkan form untuk input barang
        return view('kasir.create');
    }

    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'items.*.item_name' => 'required|string|max:255',
        'items.*.item_price' => 'required|numeric|min:0',
        'items.*.item_quantity' => 'required|integer|min:1',
    ]);

    // Simpan setiap item ke dalam database
    $itemIds = [];
    foreach ($request->items as $item) {
        $total = $item['item_price'] * $item['item_quantity'];

        // Simpan data per item dan tambahkan ID ke array
        $kasir = Kasir::create([
            'item_name' => $item['item_name'],
            'item_price' => $item['item_price'],
            'item_quantity' => $item['item_quantity'],
            'total' => $total,
        ]);

        $itemIds[] = $kasir->id; // Simpan ID barang yang baru ditambahkan
    }

    // Arahkan ke halaman struk dengan ID yang diteruskan melalui query string
    return redirect()->route('kasir.receipt', ['items' => $itemIds]);
}

public function receipt(Request $request)
{
    // Ambil semua item berdasarkan ID yang dikirim dari query string
    $kasirItems = Kasir::whereIn('id', $request->items)->get();

    // Hitung total keseluruhan dari semua barang
    $grandTotal = $kasirItems->sum('total');

    // Tampilkan struk dengan data semua barang dan total keseluruhan
    return view('kasir.receipt', compact('kasirItems', 'grandTotal'));
}


public function history()
{
    // Ambil semua barang dari database
    $kasirItems = Kasir::all();

    // Tampilkan halaman riwayat
    return view('kasir.history', compact('kasirItems'));
}



}
