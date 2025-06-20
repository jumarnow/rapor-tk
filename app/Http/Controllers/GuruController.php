<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['gurus'] = Guru::all();
        return view('guru.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);
        Guru::create($request->all());
        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['guru'] = Guru::find($id);
        return view('guru.form', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        Guru::find($id)->update($request->all());
        return redirect()->route('guru.index')->with('success', 'Guru berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Guru::find($id)->delete();
        return redirect()->route('guru.index')->with('success', 'Guru berhasil dihapus');
    }
}
