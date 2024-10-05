<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PrincipalProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PrincipalProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PrincipalProfile::create([
            'nama' => 'Dr. H. Ahmad Budi',
            'nip' => '198001012005011002',
            'foto' => 'profile/kepala.jpeg', // Ganti dengan path yang valid
            'visi' => 'Menjadi sekolah unggulan dalam pengembangan karakter dan prestasi.',
            'misi' => 'Menciptakan lingkungan belajar yang positif, berorientasi pada prestasi.',
            'bio' => 'Kepala Sekolah dengan pengalaman lebih dari 10 tahun dalam dunia pendidikan.',
            'telepon' => '021-7654321',
            'email' => 'ahmad.budi@sekolah.com',
            'riwayat_pendidikan' => 'S1 Pendidikan, S2 Manajemen Pendidikan',
        ]);
    }
}
