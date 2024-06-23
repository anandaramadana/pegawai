<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([[
            "nama"  => "admin",
            "alamat"  => "Bangkalan",
            "no_hp" => "084134353122",
            "email" => "admin@gmail.com",
            "password" => Hash::make("12345"),
            "gambar" => "admin.jpg",
            "role" => "admin",
        ]]);

        DB::table('fakultases')->insert([[
            "nama_fakultas"  => "Fakultas Teknik",
            "gambar" => "admin.jpg",
        ],[
            "nama_fakultas"  => "Fakultas Pertanian",
            "gambar" => "admin.jpg",
        ]]);

        DB::table('dosens')->insert([[
            "fakultas_id" => "1",
            "nama_pegawai" => "Ahmad",
            "nip" => "196405031990031004",
            "unit_kerja" => "FT - Program Studi Teknik Informatika",
            "fungsional" => "Lektor",
            "tugas_tambahan" => "Dekan Fakultas Teknik",
            "s1" => "Teknik Informatika - Universitas Trunojoyo Madura",
            "s1" => "Teknik Informatika - Universitas Brawijaya",
            "s2" => "Teknik Informatika - Universitas Indonesia",
            "s3" => "Teknik Informatika - Universitas Indonesia",
            "email" => "ahmad@gmail.com",
            "no_hp" => "084134353122",
            "gambar" => "admin.jpg",
        ],[
            "fakultas_id" => "2",
            "nama_pegawai"  => "Albar",
            "nip"  => "196405031990031115",
            "unit_kerja"  => "FP - Program Studi Agribisnis",
            "fungsional"  => "Lektor",
            "tugas_tambahan"  => "Dekan Fakultas Pertanian",
            "s1"  => "Agribisnis - Universitas Trunojoyo Madura",
            "s1"  => "Agribisnis - Universitas Brawijaya",
            "s2"  => "Agribisnis - Universitas Indonesia",
            "s3"  => "Agribisnis - Universitas Indonesia",
            "email"  => "albar@gmail.com",
            "no_hp" => "084134353122",
            "gambar" => "admin.jpg",
        ]]);
    }
}
