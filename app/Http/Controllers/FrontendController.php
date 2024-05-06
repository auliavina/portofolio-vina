<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Contact;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Pesanan;
use App\Models\Product;
use App\Models\Skil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skil::orderBy('id', 'DESC')->get();
        $about = About::orderBy('id', 'DESC')->first();
        $educations = Education::orderBy('id', 'DESC')->get();
        $experiences = Experience::orderBy('id', 'DESC')->get();
        $products = Product::orderBy('id', 'DESC')->get();
        $contacts = Contact::orderBy('id', 'DESC')->first();
        return view('frontend.index', [
            'about' => $about,
            'skills' => $skills,
            'educations' => $educations,
            'experiences' => $experiences,
            'products' => $products,
            'contacts' => $contacts,
        ]);
    }

    public function detailProduct($id)
    {
        $product = Product::find($id);
        return view('frontend.detail_product', [
            'product' => $product
        ]);
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

    public function pesan(Request $request)
    {
        // Validate data
        $this->validate($request, [
            'id_user' => 'required',
            'id_product' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'harga_total' => 'required',

        ]);

        // Extract data

        $bukti_pembayaran = $request->file('bukti_pembayaran');

        // Store the image (using Laravel's Storage facade)
        $bukti_pembayaran->storeAs('/gambar/foto_bukti/', $bukti_pembayaran->hashName());
        // Create a new Biodata model instance
        Pesanan::create([
            'id_user' => $request->input('id_user'),
            'id_product' => $request->input('id_product'),
            'nama' => $request->input('nama'),
            'no_hp' => $request->input('no_hp'),
            'alamat' => $request->input('alamat'),
            'status' => 'Dipesan',
            'harga_total' => $request->input('harga_total'),
            'bukti_pembayaran' => $bukti_pembayaran->hashName(),
        ]);

        // Save the new biodata and handle potential errors
        // $biodata->save();

        // Flash a success message to the session and redirect
        return redirect()->route('frontend')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function selesai($id)
    {
        $data = Pesanan::find($id);

        $data->update([
            'status' => 'Selesai'
        ]);
        return redirect()->route('frontend.pesanan')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function pesananSaya()
    {

        // Mendapatkan ID pengguna yang sedang login
        $user_id = Auth::id();

        // Mengambil pesanan yang terkait dengan pengguna yang login
        $pesanansaya = Pesanan::where('id_user', $user_id)->orderBy('id', 'DESC')->get();

        // Mengirimkan data pesanan ke tampilan
        return view('frontend.pesanan', [
            'pesanansaya' => $pesanansaya,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
