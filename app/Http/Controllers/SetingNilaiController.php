<?php

namespace App\Http\Controllers;

use App\Models\SetingNilai;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class SetingNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setingNilais = SetingNilai::with('tahunAjaran')->latest()->get();
        return view('seting_nilai.index', compact('setingNilais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tahunAjarans = TahunAjaran::all();
        return view('seting_nilai.form', compact('tahunAjarans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id',
        ], [
            'nama.required' => 'Nama setting nilai harus diisi',
            'tahun_ajaran_id.required' => 'Tahun ajaran harus dipilih',
            'tahun_ajaran_id.exists' => 'Tahun ajaran tidak valid',
        ]);

        SetingNilai::create($request->all());

        return redirect()->route('seting-nilai.index')
            ->with('success', 'Setting nilai berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SetingNilai $setingNilai)
    {
        $tahunAjarans = TahunAjaran::all();
        return view('seting_nilai.form', compact('setingNilai', 'tahunAjarans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SetingNilai $setingNilai)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id',
        ], [
            'nama.required' => 'Nama setting nilai harus diisi',
            'tahun_ajaran_id.required' => 'Tahun ajaran harus dipilih',
            'tahun_ajaran_id.exists' => 'Tahun ajaran tidak valid',
        ]);

        $setingNilai->update($request->all());

        return redirect()->route('seting-nilai.index')
            ->with('success', 'Setting nilai berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SetingNilai $setingNilai)
    {
        $setingNilai->delete();

        return redirect()->route('seting-nilai.index')
            ->with('success', 'Setting nilai berhasil dihapus');
    }
} 