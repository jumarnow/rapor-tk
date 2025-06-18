<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gurus = [
            [
                'nama' => 'Ahmad Rizki',
                'alamat' => 'Jl. Merdeka No. 1',
                'no_hp' => '081234567890',
                'foto' => 'guru1.jpg',
            ],
            [
                'nama' => 'Siti Nurhaliza',
                'alamat' => 'Jl. Sudirman No. 2',
                'no_hp' => '081234567891',
                'foto' => 'guru2.jpg',
            ],
            [
                'nama' => 'Budi Santoso',
                'alamat' => 'Jl. Gatot Subroto No. 3',
                'no_hp' => '081234567892',
                'foto' => 'guru3.jpg',
            ],
            [
                'nama' => 'Dewi Lestari',
                'alamat' => 'Jl. Asia Afrika No. 4',
                'no_hp' => '081234567893',
                'foto' => 'guru4.jpg',
            ],
            [
                'nama' => 'Eko Prasetyo',
                'alamat' => 'Jl. Diponegoro No. 5',
                'no_hp' => '081234567894',
                'foto' => 'guru5.jpg',
            ],
            [
                'nama' => 'Fitri Handayani',
                'alamat' => 'Jl. Imam Bonjol No. 6',
                'no_hp' => '081234567895',
                'foto' => 'guru6.jpg',
            ],
            [
                'nama' => 'Gunawan Wibowo',
                'alamat' => 'Jl. Veteran No. 7',
                'no_hp' => '081234567896',
                'foto' => 'guru7.jpg',
            ],
            [
                'nama' => 'Hani Safitri',
                'alamat' => 'Jl. Pahlawan No. 8',
                'no_hp' => '081234567897',
                'foto' => 'guru8.jpg',
            ],
            [
                'nama' => 'Indra Kusuma',
                'alamat' => 'Jl. Veteran No. 9',
                'no_hp' => '081234567898',
                'foto' => 'guru9.jpg',
            ],
            [
                'nama' => 'Joko Widodo',
                'alamat' => 'Jl. Merdeka No. 10',
                'no_hp' => '081234567899',
                'foto' => 'guru10.jpg',
            ],
        ];

        foreach ($gurus as $guru) {
            Guru::create($guru);
        }
    }
}
