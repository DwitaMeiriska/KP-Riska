<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::create([
            'nama_sekolah' => 'Sekolah SMAnya',
            'visi' => 'Menjadi sekolah yang unggul dan menyenangkan.',
            'misi' => 'Menciptakan lingkungan belajar yang mendukung pengembangan karakter dan akademik siswa.',
            'alamat' => 'blablablabla',
            'telepon' => '021-12345678',
            'email' => 'ozjibuwat@gmail.com',
            'deskripsi' => 'whhwhwhehhheheheh adalah institusi pendidikan yang mengedepankan teknologi dan inovasi dalam sistem pembelajaran.',
        ]);
    }
}
