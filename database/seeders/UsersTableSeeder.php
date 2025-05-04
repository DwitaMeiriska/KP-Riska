<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            //guru
            [
                'name' =>  'Guru',
                'email' => 'guru@gmail.com',
                'password' => Hash::make('adminadmin'),
                'role' => 'guru',
            ],

            //kelas
            [
                'name' =>  'Kelas',
                'email' => 'kelas@gmail.com',
                'password' => Hash::make('adminadmin'),
                'role' => 'kelas',
            ],
            //kepala
            [
                'name' =>  'Kepala Sekolah',
                'email' => 'kepala@gmail.com',
                'password' => Hash::make('adminadmin'),
                'role' => 'kepala',
            ],

            //instansi
            [
                'name' =>  'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('adminadmin'),
                'role' => 'admin',
            ]
        ]);
    }
}
