<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contacts = Contact::orderBy('id', 'DESC')->get();
        return view('admin.contact.index', [
            'contacts' => $contacts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.create');
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
            'location' => 'required|string',
            'email' => 'required|string',
            'call' => 'required|string',
        ]);

        // Extract data
        $location = $request->input('location');
        $email = $request->input('email');
        $call = $request->input('call');

        // Create a new About model instance
        Contact::create([
            'location' => $location,
            'email' => $email,
            'call' => $call,
        ]);

        // Flash a success message to the session and redirect
        return redirect()->route('contact')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contacts = Contact::find($id);
        return view('admin.contact.edit', [
            'contacts' => $contacts
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Contact::find($id);

        $this->validate($request, [
            'location' => 'required|string',
            'email' => 'required|string',
            'call' => 'required|string',
        ]);

        // Extract data
        $location = $request->input('location');
        $email = $request->input('email');
        $call = $request->input('call');


        $data->update([
            'location' => $location,
            'email' => $email,
            'call' => $call,
        ]);

        return redirect()->route('contact')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::find($id)->delete();

        return redirect()->route('contact')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
