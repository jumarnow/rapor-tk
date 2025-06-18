<?php

namespace App\Http\Controllers;

use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahunAjarans = TahunAjaran::latest()->get();
        return view('tahun_ajaran.index', compact('tahunAjarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tahun_ajaran.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:255|unique:tahun_ajarans,kode',
            'nama' => 'required|string|max:255',
            'status' => 'required|in:aktif,tidak_aktif',
        ], [
            'kode.required' => 'Kode tahun ajaran harus diisi',
            'kode.unique' => 'Kode tahun ajaran sudah digunakan',
            'nama.required' => 'Nama tahun ajaran harus diisi',
            'status.required' => 'Status harus dipilih',
            'status.in' => 'Status tidak valid',
        ]);

        // If the new record is set as active, deactivate all other records
        if ($request->status === 'aktif') {
            TahunAjaran::where('status', 'aktif')->update(['status' => 'tidak_aktif']);
        }

        TahunAjaran::create($request->all());

        return redirect()->route('tahun-ajaran.index')
            ->with('success', 'Tahun ajaran berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(TahunAjaran $tahunAjaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TahunAjaran $tahunAjaran)
    {
        return view('tahun_ajaran.form', compact('tahunAjaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TahunAjaran $tahunAjaran)
    {
        $request->validate([
            'kode' => 'required|string|max:255|unique:tahun_ajarans,kode,' . $tahunAjaran->id,
            'nama' => 'required|string|max:255',
            'status' => 'required|in:aktif,tidak_aktif',
        ], [
            'kode.required' => 'Kode tahun ajaran harus diisi',
            'kode.unique' => 'Kode tahun ajaran sudah digunakan',
            'nama.required' => 'Nama tahun ajaran harus diisi',
            'status.required' => 'Status harus dipilih',
            'status.in' => 'Status tidak valid',
        ]);

        // If the record is being set as active, deactivate all other records
        if ($request->status === 'aktif') {
            TahunAjaran::where('id', '!=', $tahunAjaran->id)
                ->where('status', 'aktif')
                ->update(['status' => 'tidak_aktif']);
        }

        $tahunAjaran->update($request->all());

        return redirect()->route('tahun-ajaran.index')
            ->with('success', 'Tahun ajaran berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TahunAjaran $tahunAjaran)
    {
        // Check if this is the only active year
        if ($tahunAjaran->status === 'aktif') {
            return redirect()->route('tahun-ajaran.index')
                ->with('error', 'Tidak dapat menghapus tahun ajaran yang aktif');
        }

        $tahunAjaran->delete();

        return redirect()->route('tahun-ajaran.index')
            ->with('success', 'Tahun ajaran berhasil dihapus');
    }
}
