<?php

namespace Database\Seeders;

use App\Models\NilaiRaporSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NilaiRaporSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nama = [
            'NILAI AGAMA DAN BUDI PEKERTI',
            'JATI DIRI',
            'LITERASI DASAR, MATEMATIKA, SAIN, TEKNOLOGI, REKAYASA DAN SENI',
            'PROJEK PENGUATAN PROFIL PELAJAR PANCASILA',
        ];

        foreach ($nama as $item) {
            NilaiRaporSetting::create([
                'nama' => $item,
                'tahun_ajaran_id' => 1,
            ]);
        }
    }
}
