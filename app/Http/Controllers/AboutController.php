<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::orderBy('id', 'DESC')->get();
        return view('admin.about.index', [
            'abouts' => $abouts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate data
        $this->validate($request, [
            'nama' => 'required|string',
            'ulang_tahun' => 'required|string',
            'website' => 'required|string',
            'no_hp' => 'required|string',
            'umur' => 'required|string',
            'email' => 'required|email|unique:abouts,email', // Ensures unique email
            'profil' => 'required|string',
            'foto' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        // Extract data
        $nama = $request->input('nama');
        $ulang_tahun = $request->input('ulang_tahun');
        $website = $request->input('website');
        $no_hp = $request->input('no_hp');
        $umur = $request->input('umur');
        $email = $request->input('email');
        $profil = $request->input('profil');
        $foto = $request->file('foto');

        // dd($foto);
        // Store the image (using Laravel's Storage facade)
        $foto->storeAs('/gambar/foto_about/', $foto->hashName());
        // Create a new About model instance
        About::create([
            'nama' => $nama,
            'ulang_tahun' => $ulang_tahun,
            'website' => $website,
            'no_hp' => $no_hp,
            'umur' => $umur,
            'email' => $email,
            'profil' => $profil,
            'foto' => $foto->hashName(),
        ]);

        // Save the new biodata and handle potential errors
        // $biodata->save();

        // Flash a success message to the session and redirect
        return redirect()->route('about')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $abouts = About::find($id);
        return view('admin.about.edit', [
            'abouts' => $abouts
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $data = About::find($id);

        $this->validate($request, [
            'nama' => 'required|string',
            'ulang_tahun' => 'required|string',
            'website' => 'required|string',
            'no_hp' => 'required|string',
            'umur' => 'required|string',
            'email' => 'required|email|unique:abouts,email,' . $id,
            'profil' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048'

            // 'foto' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048'
        ]);

        // Extract data
        $nama = $request->input('nama');
        $ulang_tahun = $request->input('ulang_tahun');
        $website = $request->input('website');
        $no_hp = $request->input('no_hp');
        $umur = $request->input('umur');
        $email = $request->input('email');
        $profil = $request->input('profil');
        $foto = $request->file('foto');

        if ($foto) {
            //upload image
            $foto->storeAs('/gambar/foto_about/', $foto->hashName());

            // Hapus Gambar lama
            Storage::exists('/gambar/foto_about/' . $data->foto);
            Storage::delete('/gambar/foto_about/' . $data->foto);

            $data->update([
                'nama' => $nama,
                'ulang_tahun' => $ulang_tahun,
                'website' => $website,
                'no_hp' => $no_hp,
                'umur' => $umur,
                'email' => $email,
                'profil' => $profil,
                'foto' => $foto->hashName(),
            ]);
        } else {
            $data->update([
                'nama' => $nama,
                'ulang_tahun' => $ulang_tahun,
                'website' => $website,
                'no_hp' => $no_hp,
                'umur' => $umur,
                'email' => $email,
                'profil' => $profil,
            ]);
        }
        return redirect()->route('about')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { {
            $data = About::find($id);

            // Hapus Gambar lama
            Storage::exists('/gambar/foto_about/' . $data->foto);
            Storage::delete('/gambar/foto_about/' . $data->foto);

            // Hapus modul dari database
            $data->delete();

            return redirect()->route('about')
                ->with('Success', 'Data deleted successfully');
        }
    }
}
