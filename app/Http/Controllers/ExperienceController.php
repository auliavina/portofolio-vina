<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experiences = Experience::orderBy('id', 'DESC')->get();
        return view('admin.experience.index', [
            'experiences' => $experiences,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.experience.create');
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
            'pengalaman' => 'required|string',
            'tahun' => 'required|string',
        ]);

        // Extract data
        $pengalaman = $request->input('pengalaman');
        $tahun = $request->input('tahun');

        // Create a new About model instance
        Experience::create([
            'pengalaman' => $pengalaman,
            'tahun' => $tahun,
        ]);

        // Flash a success message to the session and redirect
        return redirect()->route('experience')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $experiences = Experience::find($id);
        return view('admin.experience.edit', [
            'experiences' => $experiences
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Experience::find($id);

        $this->validate($request, [
            'pengalaman' => 'required|string',
            'tahun' => 'required|string',
        ]);

        // Extract data
        $pengalaman = $request->input('pengalaman');
        $tahun = $request->input('tahun');


        $data->update([
            'pengalaman' => $pengalaman,
            'tahun' => $tahun,
        ]);

        return redirect()->route('experience')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Experience::find($id)->delete();

        return redirect()->route('experience')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
