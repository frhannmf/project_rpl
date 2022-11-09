<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserDummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'dummy@silani.com',
            'password' => Hash::make('12345Tes'),
            'nim' => '123456789',
            'gender' => 'Laki-Laki',
            'prodi' => 'DIV Komputasi Statistik',
            'status' => 'ALUMNI',
            'tahun_lulus' => '2020'
        ]);

        DB::table('users')->insert([
            'email' => 'dummy1@silani.com',
            'password' => Hash::make('12345Tes'),
            'nim' => '987654321',
            'gender' => 'Perempuan',
            'prodi' => 'DIV Statistika',
            'status' => 'MAHASISWA',
            'tahun_lulus' => '-'
        ]);
    }
}
