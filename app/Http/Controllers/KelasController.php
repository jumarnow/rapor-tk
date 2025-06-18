<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\TahunAjaran;
use App\Models\Guru;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::with(['tahun_ajaran', 'guru'])->latest()->get();
        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tahunAjarans = TahunAjaran::all();
        $gurus = Guru::all();
        return view('kelas.form', compact('tahunAjarans', 'gurus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tahun_ajarans_id' => 'required|exists:tahun_ajarans,id',
            'guru_id' => 'required|exists:gurus,id',
        ], [
            'nama.required' => 'Nama kelas harus diisi',
            'tahun_ajarans_id.required' => 'Tahun ajaran harus dipilih',
            'tahun_ajarans_id.exists' => 'Tahun ajaran tidak valid',
            'guru_id.required' => 'Wali kelas harus dipilih',
            'guru_id.exists' => 'Wali kelas tidak valid',
        ]);

        // Check if the teacher is already a homeroom teacher for another class
        $existingKelas = Kelas::where('guru_id', $request->guru_id)->first();
        if ($existingKelas) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['guru_id' => 'Guru ini sudah menjadi wali kelas di kelas lain']);
        }

        Kelas::create($request->all());

        return redirect()->route('kelas.index')
            ->with('success', 'Kelas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        $tahunAjarans = TahunAjaran::all();
        $gurus = Guru::all();
        return view('kelas.form', compact('kelas', 'tahunAjarans', 'gurus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tahun_ajarans_id' => 'required|exists:tahun_ajarans,id',
            'guru_id' => 'required|exists:gurus,id',
        ], [
            'nama.required' => 'Nama kelas harus diisi',
            'tahun_ajarans_id.required' => 'Tahun ajaran harus dipilih',
            'tahun_ajarans_id.exists' => 'Tahun ajaran tidak valid',
            'guru_id.required' => 'Wali kelas harus dipilih',
            'guru_id.exists' => 'Wali kelas tidak valid',
        ]);

        // Check if the teacher is already a homeroom teacher for another class
        $existingKelas = Kelas::where('guru_id', $request->guru_id)
            ->where('id', '!=', $kelas->id)
            ->first();
        if ($existingKelas) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['guru_id' => 'Guru ini sudah menjadi wali kelas di kelas lain']);
        }

        $kelas->update($request->all());

        return redirect()->route('kelas.index')
            ->with('success', 'Kelas berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        // Check if there are any students in this class
        if ($kelas->siswa()->exists()) {
            return redirect()->route('kelas.index')
                ->with('error', 'Tidak dapat menghapus kelas yang memiliki siswa');
        }

        $kelas->delete();

        return redirect()->route('kelas.index')
            ->with('success', 'Kelas berhasil dihapus');
    }
}
