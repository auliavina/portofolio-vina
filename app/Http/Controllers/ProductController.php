<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        return view('admin.product.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Melakukan Validasi Data
        $this->validate($request, [
            'nama_product' => 'required',
            'harga_satuan' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $nama_product = $request->input('nama_product');
        $harga_satuan = $request->input('harga_satuan');
        $deskripsi = $request->input('deskripsi');
        $foto = $request->file('foto');

        //upload image
        $foto->storeAs('/gambar/foto_product/', $foto->hashName());


        Product::create([
            'nama_product' => $nama_product,
            'harga_satuan' => $harga_satuan,
            'deskripsi' => $deskripsi,
            'foto'     => $foto->hashName(),
        ]);
        //redirect to index
        return redirect()->route('product')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.edit', [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Product::find($id);

        // Melakukan Validasi Data
        $this->validate($request, [
            'nama_product' => 'required',
            'harga_satuan' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        $nama_product = $request->input('nama_product');
        $harga_satuan = $request->input('harga_satuan');
        $deskripsi = $request->input('deskripsi');
        $foto = $request->file('foto');

        if ($foto) {
            //upload image
            $foto->storeAs('/gambar/foto_product/', $foto->hashName());

            // Hapus Gambar lama
            Storage::exists('/gambar/foto_product/' . $data->foto);
            Storage::delete('/gambar/foto_product/' . $data->foto);

            $data->update([
                'nama_product' => $nama_product,
                'harga_satuan' => $harga_satuan,
                'deskripsi' => $deskripsi,
                'foto'     => $foto->hashName(),
            ]);
        } else {
            $data->update([
                'nama_product' => $nama_product,
                'harga_satuan' => $harga_satuan,
                'deskripsi' => $deskripsi,
            ]);
        }
        return redirect()->route('product')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { {
            $data = Product::find($id);

            // Hapus Gambar lama
            Storage::exists('/gambar/foto_product/' . $data->foto);
            Storage::delete('/gambar/foto_product/' . $data->foto);

            // Hapus modul dari database
            $data->delete();

            return redirect()->route('product')
                ->with('Success', 'Data deleted successfully');
        }
    }
}
