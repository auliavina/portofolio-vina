<?php

namespace App\Http\Controllers;

use App\Models\Skil;
use Illuminate\Http\Request;

class SkilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skills = Skil::all();
        return view('admin.skill.index', [
            'skills' => $skills
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.skill.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string',
            'nilai' => 'required|integer',
        ]);

        Skil::create($request->all());

        return redirect()->route('skill')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skil  $skil
     * @return \Illuminate\Http\Response
     */
    public function show(Skil $skil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skil  $skil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Skil::find($id);
        return view('admin.skill.edit', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Skil  $skil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $this->validate($request, [
            'nama' => 'required|string',
            'nilai' => 'required|integer',
        ]);

        Skil::find($id)->update($request->all());

        return redirect()->route('skill')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skil  $skil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Skil::find($id)->delete();

        return redirect()->route('skill')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
