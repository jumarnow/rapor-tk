<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    \App\Models\TahunAjaran::create([
        'kode' => '2023/2024',
        'nama' => 'Tahun Ajaran 2023/2024',
        'status' => 'aktif'
    ]);

    \App\Models\TahunAjaran::create([
        'kode' => '2024/2025',
        'nama' => 'Tahun Ajaran 2024/2025',
        'status' => 'tidak_aktif'
    ]);
    }
}
