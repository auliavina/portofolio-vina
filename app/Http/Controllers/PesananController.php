<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Product;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanans = Pesanan::orderBy('id', 'DESC')->get();
        return view('admin.pesanan.index', [
            'pesanans' => $pesanans,
        ]);
    }

    public function laporan()
    {
        $pesanans = Pesanan::orderBy('id', 'DESC')->get();
        return view('admin.pesanan.laporan', [
            'pesanans' => $pesanans,
        ]);
    }

    public function pemesanan(Request $request)
    {
        // Melakukan Validasi Data
        $this->validate($request, [
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'status' => 'status',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $nama = $request->input('nama');
        $id_product = $request->input('id_product');
        $no_hp = $request->input('no_hp');
        $alamat = $request->input('alamat');
        $product = Product::where('id', $id_product)->first();

        $total = $product->harga;
        $data = Pesanan::create([
            'nama' => $nama,
            'id_product' => $id_product,
            'no_hp' => $no_hp,
            'alamat' => $alamat,
            'harga_total' => $total . '000',
            'status' => 'Sedang diproses',

        ]);

        return redirect()->route('pesanan.berhasil', ['id' => $data->id])
            ->with('success', 'Pesanan berhasil dipesan.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function diproses($id)
    {
        $data = Pesanan::find($id);

        $data->update([
            'status' => 'Diproses'
        ]);
        return redirect()->route('pesanan')
            ->with('success', 'Pesanan sedang diproses');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pesanan $pesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesanan $pesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesanan $pesanan)
    {
        //
    }
}
