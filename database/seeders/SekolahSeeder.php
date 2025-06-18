<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Sekolah::create([
            'nama' => 'Sekolah Dasar Negeri 1',
            'alamat' => 'Jl. Raya Nusa Tenggara',
            'no_telp' => '081234567890',
            'email' => 'sekolah@gmail.com',
            'website' => 'https://sekolah.com',
            'logo' => 'logo.png',
            'nama_kepala_sekolah' => 'Kepala Sekolah'
        ]);
    }
}
