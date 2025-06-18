<?php

namespace Database\Seeders;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $kelas = Kelas::all();

        // Array of common Indonesian names
        $firstNames = ['Ahmad', 'Muhammad', 'Abdul', 'Rizki', 'Dewi', 'Siti', 'Nur', 'Putri', 'Aisyah', 'Fatimah'];
        $lastNames = ['Putra', 'Pratama', 'Ramadhan', 'Hidayat', 'Nugroho', 'Wijaya', 'Saputra', 'Hasan', 'Rahman', 'Syah'];

        // Array of common Indonesian cities
        $cities = ['Jakarta', 'Bandung', 'Surabaya', 'Yogyakarta', 'Semarang', 'Malang', 'Medan', 'Palembang', 'Makassar', 'Denpasar'];
        
        // Array of common Indonesian districts
        $districts = ['Kemayoran', 'Cikini', 'Menteng', 'Kebayoran', 'Tebet', 'Pancoran', 'Mampang', 'Kuningan', 'Senayan', 'Grogol'];

        // Array of common Indonesian provinces
        $provinces = ['DKI Jakarta', 'Jawa Barat', 'Jawa Timur', 'Jawa Tengah', 'Sumatera Utara', 'Sumatera Selatan', 'Sulawesi Selatan', 'Bali'];

        // Array of common Indonesian religions
        $religions = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];

        // Array of common occupations
        $occupations = ['Wiraswasta', 'PNS', 'Guru', 'Dokter', 'Perawat', 'Pedagang', 'Karyawan Swasta', 'Petani', 'Nelayan', 'Pengusaha'];

        for ($i = 0; $i < 100; $i++) {
            $firstName = $faker->randomElement($firstNames);
            $lastName = $faker->randomElement($lastNames);
            $gender = $faker->randomElement(['Laki-laki', 'Perempuan']);
            
            // Generate NIK (16 digits)
            $nik = $faker->numerify('################');
            
            // Generate NISN (10 digits)
            $nisn = $faker->numerify('##########');

            Siswa::create([
                'nama_anak' => $firstName . ' ' . $lastName,
                'nama_panggilan' => $firstName,
                'nik' => $nik,
                'nisn' => $nisn,
                'jenis_kelamin' => $gender,
                'tempat_lahir' => $faker->randomElement($cities),
                'tanggal_lahir' => $faker->dateTimeBetween('-15 years', '-5 years'),
                'agama' => $faker->randomElement($religions),
                'alamat' => $faker->address(),
                'no_hp' => $faker->numerify('08##########'),
                'anak_ke' => $faker->numberBetween(1, 5),
                'jumlah_saudara' => $faker->numberBetween(0, 4),
                'nama_ayah' => $faker->name('male'),
                'nama_ibu' => $faker->name('female'),
                'pekerjaan_ayah' => $faker->randomElement($occupations),
                'pekerjaan_ibu' => $faker->randomElement($occupations),
                'nama_jalan_desa' => $faker->streetAddress(),
                'kecamatan' => $faker->randomElement($districts),
                'kabupaten_kota' => $faker->randomElement($cities),
                'provinsi' => $faker->randomElement($provinces),
                'kode_pos' => $faker->numerify('#####'),
                'kelas_id' => $kelas->random()->id,
                'foto' => null, // You can add default photo path if needed
            ]);
        }
    }
}
