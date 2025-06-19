<?php

namespace App\Http\Controllers;

use App\Models\NilaiRaporSetting;
use App\Models\TahunAjaran;
use App\Models\Kelas;
use App\Models\NilaiRaporSettingKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiRaporSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nilaiRaporSettings = NilaiRaporSetting::with('tahunAjaran')->get();
        return view('nilai_rapor_setting.index', compact('nilaiRaporSettings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tahunAjarans = TahunAjaran::all();
        $kelas = Kelas::all();
        $selectedKelas = [];
        return view('nilai_rapor_setting.form', compact('tahunAjarans', 'kelas', 'selectedKelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id',
            'kelas_id' => 'required|array|min:1',
            'kelas_id.*' => 'exists:kelas,id',
        ], [
            'nama.required' => 'Nama setting nilai rapor harus diisi',
            'tahun_ajaran_id.required' => 'Tahun ajaran harus dipilih',
            'tahun_ajaran_id.exists' => 'Tahun ajaran tidak valid',
            'kelas_id.required' => 'Minimal satu kelas harus dipilih',
            'kelas_id.*.exists' => 'Kelas tidak valid',
        ]);

        DB::transaction(function () use ($request) {
            $nilaiRaporSetting = NilaiRaporSetting::create($request->only(['nama', 'tahun_ajaran_id']));
            foreach ($request->kelas_id as $kelasId) {
                $kelas = Kelas::find($kelasId);
                NilaiRaporSettingKelas::create([
                    'nilai_rapor_setting_id' => $nilaiRaporSetting->id,
                    'kelas_id' => $kelasId,
                    'nilai_rapor_setting_str' => $nilaiRaporSetting->nama,
                    'kelas_str' => $kelas->nama,
                ]);
            }
        });

        return redirect()->route('nilai-rapor-setting.index')
            ->with('success', 'Setting nilai rapor berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NilaiRaporSetting $nilaiRaporSetting)
    {
        $tahunAjarans = TahunAjaran::all();
        $kelas = Kelas::all();
        $selectedKelas = $nilaiRaporSetting->nilaiRaporSettingKelas->pluck('kelas_id')->toArray();
        return view('nilai_rapor_setting.form', compact('nilaiRaporSetting', 'tahunAjarans', 'kelas', 'selectedKelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NilaiRaporSetting $nilaiRaporSetting)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id',
            'kelas_id' => 'required|array|min:1',
            'kelas_id.*' => 'exists:kelas,id',
        ], [
            'nama.required' => 'Nama setting nilai rapor harus diisi',
            'tahun_ajaran_id.required' => 'Tahun ajaran harus dipilih',
            'tahun_ajaran_id.exists' => 'Tahun ajaran tidak valid',
            'kelas_id.required' => 'Minimal satu kelas harus dipilih',
            'kelas_id.*.exists' => 'Kelas tidak valid',
        ]);

        DB::transaction(function () use ($request, $nilaiRaporSetting) {
            $nilaiRaporSetting->update($request->only(['nama', 'tahun_ajaran_id']));
            // Delete old relations
            NilaiRaporSettingKelas::where('nilai_rapor_setting_id', $nilaiRaporSetting->id)->delete();
            foreach ($request->kelas_id as $kelasId) {
                $kelas = Kelas::find($kelasId);
                NilaiRaporSettingKelas::create([
                    'nilai_rapor_setting_id' => $nilaiRaporSetting->id,
                    'kelas_id' => $kelasId,
                    'nilai_rapor_setting_str' => $nilaiRaporSetting->nama,
                    'kelas_str' => $kelas->nama,
                ]);
            }
        });

        return redirect()->route('nilai-rapor-setting.index')
            ->with('success', 'Setting nilai rapor berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NilaiRaporSetting $nilaiRaporSetting)
    {
        $nilaiRaporSetting->delete();

        return redirect()->route('nilai-rapor-setting.index')
            ->with('success', 'Setting nilai rapor berhasil dihapus');
    }
}
