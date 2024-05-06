<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = Education::orderBy('id', 'DESC')->get();
        return view('admin.education.index', [
            'educations' => $educations,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.education.create');
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
            'tempat_pend' => 'required|string',
            'jurusan' => 'required|string',
            'tahun' => 'required|string',
        ]);

        // Extract data
        $tempat_pend = $request->input('tempat_pend');
        $jurusan = $request->input('jurusan');
        $tahun = $request->input('tahun');

        // Create a new About model instance
        Education::create([
            'tempat_pend' => $tempat_pend,
            'jurusan' => $jurusan,
            'tahun' => $tahun,
        ]);

        // Flash a success message to the session and redirect
        return redirect()->route('education')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $educations = Education::find($id);
        return view('admin.education.edit', [
            'educations' => $educations
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Education::find($id);

        $this->validate($request, [
            'tempat_pend' => 'required|string',
            'jurusan' => 'required|string',
            'tahun' => 'required|string',
        ]);

        // Extract data
        $tempat_pend = $request->input('tempat_pend');
        $jurusan = $request->input('jurusan');
        $tahun = $request->input('tahun');


        $data->update([
            'tempat_pend' => $tempat_pend,
            'jurusan' => $jurusan,
            'tahun' => $tahun,
        ]);

        return redirect()->route('education')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Education::find($id)->delete();

        return redirect()->route('education')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
