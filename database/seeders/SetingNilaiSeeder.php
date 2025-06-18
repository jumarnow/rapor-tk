<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetingNilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\SetingNilai::create([
            'nama' => 'Setting Nilai Semester 1',
            'tahun_ajaran_id' => 1
        ]);

        \App\Models\SetingNilai::create([
            'nama' => 'Setting Nilai Semester 2',
            'tahun_ajaran_id' => 1
        ]);
    }
}
