<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Kelas::create([
            'nama' => 'Kelas 1A',
            'tahun_ajarans_id' => 1,
            'guru_id' => 1
        ]);

        \App\Models\Kelas::create([
            'nama' => 'Kelas 1B', 
            'tahun_ajarans_id' => 1,
            'guru_id' => 2
        ]);

        \App\Models\Kelas::create([
            'nama' => 'Kelas 1C',
            'tahun_ajarans_id' => 1,
            'guru_id' => 3
        ]);
    }
}
